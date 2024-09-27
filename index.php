<?php
// Kết nối đến cơ sở dữ liệu
include 'assets/database/db.php';
include 'assets/database/functions.php';
include 'assets/database/ajax.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Shopii</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include 'pages/navbar.php'; ?>
    
    <?php include 'pages/header.php'; ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include 'pages/sidebar.php'; ?>
            </div>
            <div class="col-md-9 content">
                <?php include 'pages/home.php'; ?>
            </div>
        </div>
    </div>

    <?php include 'pages/footer.php'; ?>

</body>
</html>