$(document).ready(function() {
    $('.nav-link').on('click', function(e) {
        e.preventDefault();
        var page = $(this).data('page');
        
        $.ajax({
            url: 'assets/database/load_content.php',
            type: 'POST',
            data: { page: page },
            success: function(response) {
                $('.content').html(response);
            },
            error: function() {
                alert('Error loading content.');
            }
        });
    });
});

$(document).ready(function() {
    // Load the laptop list on page load
    loadLaptops();

    // Add a new laptop
    $('#addLaptopForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            type: 'POST',
            url: 'assets/database/add_laptop.php', // Script to handle adding a laptop
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    loadLaptops(); // Reload the list of laptops
                    $('#addLaptopModal').modal('hide'); // Close the modal
                    $('#addLaptopForm')[0].reset(); // Reset the form
                } else {
                    alert('Error: ' + response.message);
                }
            }
        });
    });

    // Update an existing laptop
    $(document).on('submit', '#editLaptopForm', function(e) {
        e.preventDefault();
        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            type: 'POST',
            url: 'assets/database/update_laptop.php', // Script to handle updating a laptop
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    loadLaptops(); // Reload the list of laptops
                    $('#editLaptopModal').modal('hide'); // Close the modal
                } else {
                    alert('Error: ' + response.message);
                }
            }
        });
    });

    // Delete a laptop
    $(document).on('click', '.delete-laptop', function() {
        var laptopId = $(this).data('id'); // Get the laptop ID

        if (confirm('Are you sure you want to delete this laptop?')) {
            $.ajax({
                type: 'POST',
                url: 'assets/database/delete_laptop.php', // Script to handle deletion
                data: { id: laptopId },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        loadLaptops(); // Reload the list of laptops
                    } else {
                        alert('Error: ' + response.message);
                    }
                }
            });
        }
    });

    // Load the laptop list
    function loadLaptops() {
        $.ajax({
            url: 'pages/laptops.php', // The page to fetch the list of laptops
            type: 'GET',
            success: function(response) {
                $('.content').html(response); // Inject the list into the content area
            }
        });
    }

    // Fetch laptop data and fill the edit form
    $(document).on('click', '.edit-laptop', function() {
        var laptopId = $(this).data('id'); // Get the laptop ID

        $.ajax({
            url: 'assets/database/fetch_laptop.php', // Script to fetch laptop data by ID
            type: 'POST',
            data: { id: laptopId },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Fill the form with the laptop data
                    $('#editLaptopModal input[name="id"]').val(response.data.id);
                    $('#editLaptopModal input[name="name"]').val(response.data.name);
                    $('#editLaptopModal input[name="brand"]').val(response.data.brand);
                    $('#editLaptopModal input[name="price"]').val(response.data.price);
                    $('#editLaptopModal input[name="stock"]').val(response.data.stock);
                    $('#editLaptopModal input[name="specs"]').val(response.data.specs);
                    $('#editLaptopModal').modal('show'); // Show the edit modal
                } else {
                    alert('Error: ' + response.message);
                }
            }
        });
    });
});
