<div class="row">
    <div class="col-md-12">
        <h2>Laptops</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLaptopModal">
            Add New Laptop
        </button>
        <div class="row mt-4" id="laptop-list">
            <?php
            $laptops = fetchAll('laptops');
            foreach ($laptops as $laptop) {
                echo '<div class="col-md-4">';
                echo '<div class="card mb-4">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $laptop['brand'] . ' ' . $laptop['model'] . '</h5>';
                echo '<p class="card-text">Price: $' . $laptop['price'] . '</p>';
                echo '<p class="card-text">Stock: ' . $laptop['stock_quantity'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>

<!-- Add Laptop Modal -->
<div class="modal fade" id="addLaptopModal" tabindex="-1" role="dialog" aria-labelledby="addLaptopModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLaptopModalLabel">Add New Laptop</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addLaptopForm">
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="model" name="model" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="stock_quantity">Stock Quantity</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="specs">Specifications</label>
                        <textarea class="form-control" id="specs" name="specs" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="release_date">Release Date</label>
                        <input type="date" class="form-control" id="release_date" name="release_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Laptop</button>
                </form>
            </div>
        </div>
    </div>
</div>