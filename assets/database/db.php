<?php
// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost";  // Máy chủ MySQL (có thể thay đổi nếu không dùng localhost)
$username = "root";         // Tên người dùng MySQL
$password = "";             // Mật khẩu của MySQL (thay đổi theo cấu hình của bạn)
$dbname = "laptop_store";   // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";
?>
