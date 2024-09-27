$(document).ready(function(){
    // Handle form submission for adding a new laptop
    $('#addLaptopForm').submit(function(e){
        e.preventDefault(); // Prevent the page from reloading
        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            type: 'POST',
            url: 'assets/database/add_laptop.php', // URL of the script to handle form submission
            data: formData,
            success: function(response) {
                // Handle the response from the server
                if(response.success) {
                    // Reload the list of laptops
                    loadLaptops();
                    // Close the modal
                    $('#addLaptopModal').modal('hide');
                } else {
                    alert('Error: ' + response.message);
                }
            }
        });
    });

    // Function to load laptops
    function loadLaptops() {
        $.ajax({
            url: 'pages/laptops.php',
            success: function(response) {
                $('.content').html(response);
            }
        });
    }
});