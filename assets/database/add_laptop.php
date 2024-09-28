<?php
include 'db.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $specs = $_POST['specs'];
    $release_date = $_POST['release_date'];

    $query = "INSERT INTO laptops (brand, model, price, stock_quantity, specs, release_date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdisd", $brand, $model, $price, $stock_quantity, $specs, $release_date);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add laptop']);
    }

    $stmt->close();
    $conn->close();
}
?>