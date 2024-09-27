<h2>Orders</h2>
<p>Manage your orders here.</p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer ID</th>
            <th>Order Date</th>
            <th>Total Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../assets/database/functions.php';
        $orders = fetchAll('orders');
        foreach ($orders as $order) {
            echo '<tr>';
            echo '<td>' . $order['id'] . '</td>';
            echo '<td>' . $order['customer_id'] . '</td>';
            echo '<td>' . $order['order_date'] . '</td>';
            echo '<td>' . $order['total_amount'] . '</td>';
            echo '<td>' . $order['status'] . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>