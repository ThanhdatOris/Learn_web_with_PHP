<?php
include '../assets/database/functions.php';

// Xử lý yêu cầu thêm đơn hàng mới
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $total = $_POST['total'];
    $query = "INSERT INTO orders (customer_name, total) VALUES ('$customer_name', '$total')";
    executeQuery($query);
    echo json_encode(['success' => true]);
    exit;
}
?>

<h2>Orders</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOrderModal">
    Add New Order
</button>
<div class="row mt-4">
    <?php
    $orders = fetchAll('orders');
    foreach ($orders as $order) {
        echo '<div class="col-md-4">';
        echo '<div class="card mb-4">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Order #' . $order['id'] . '</h5>';
        echo '<p class="card-text">Customer: ' . (isset($order['customer_name']) ? $order['customer_name'] : 'N/A') . '</p>';
        echo '<p class="card-text">Total: $' . (isset($order['total']) ? $order['total'] : '0.00') . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>

<!-- Add Order Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrderModalLabel">Add New Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addOrderForm">
                    <div class="form-group">
                        <label for="customer_name" class="col-form-label">Customer Name:</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="total" class="col-form-label">Total:</label>
                        <input type="number" class="form-control" id="total" name="total" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveOrderBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('saveOrderBtn').addEventListener('click', function() {
    var form = document.getElementById('addOrderForm');
    var formData = new FormData(form);

    fetch('orders.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Reload the page to see the new order
            location.reload();
        } else {
            alert('Failed to add order.');
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>