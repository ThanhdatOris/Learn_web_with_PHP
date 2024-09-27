<h2>Customers</h2>
<p>View and manage your customers here.</p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Registration Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../assets/database/functions.php';
        $customers = fetchAll('customers');
        foreach ($customers as $customer) {
            echo '<tr>';
            echo '<td>' . $customer['id'] . '</td>';
            echo '<td>' . $customer['name'] . '</td>';
            echo '<td>' . $customer['email'] . '</td>';
            echo '<td>' . $customer['phone'] . '</td>';
            echo '<td>' . $customer['address'] . '</td>';
            echo '<td>' . $customer['registration_date'] . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>