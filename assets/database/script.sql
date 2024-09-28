-- Tạo cơ sở dữ liệu laptop_store
CREATE DATABASE laptop_store;
USE laptop_store;

-- Bảng khách hàng
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(20),
    address VARCHAR(255),
    registration_date DATE
);

-- Bảng sản phẩm (laptop)
CREATE TABLE laptops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(100),
    model VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT,
    specs TEXT,
    release_date DATE
);

-- Bảng đơn hàng
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date DATE,
    total_amount DECIMAL(10, 2),
    status VARCHAR(50),
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

-- Bảng chi tiết đơn hàng
CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    laptop_id INT,
    quantity INT,
    price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (laptop_id) REFERENCES laptops(id)
);

-- Bảng nhân viên
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(20),
    position VARCHAR(100),
    hire_date DATE
);

-- Bảng hóa đơn
CREATE TABLE invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    issue_date DATE,
    payment_method VARCHAR(50),
    total_amount DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

-- Bảng người dùng (admin và nhân viên)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(100),
    role ENUM('admin', 'employee')
);

-- Dữ liệu mẫu cho bảng khách hàng
INSERT INTO customers (name, email, phone, address, registration_date) 
VALUES 
('Nguyen Van A', 'nva@example.com', '0909000000', '123 Le Loi, Ho Chi Minh', '2024-09-26'),
('Tran Thi B', 'ttb@example.com', '0918000000', '456 Nguyen Trai, Ha Noi', '2024-09-20');

-- Dữ liệu mẫu cho bảng laptop
INSERT INTO laptops (brand, model, price, stock_quantity, specs, release_date) 
VALUES 
('Apple', 'MacBook Air M1', 1200.00, 50, 'Apple M1, 8GB RAM, 256GB SSD', '2020-11-17'),
('Dell', 'XPS 13', 1300.00, 30, 'Intel i7, 16GB RAM, 512GB SSD', '2022-01-15'),
('Asus', 'ZenBook 14', 1000.00, 40, 'AMD Ryzen 7, 16GB RAM, 1TB SSD', '2023-03-10');

-- Dữ liệu mẫu cho bảng nhân viên
INSERT INTO employees (name, email, phone, position, hire_date)
VALUES 
('Le Thi C', 'ltc@example.com', '0907000000', 'Manager', '2023-06-01'),
('Pham Van D', 'pvd@example.com', '0919000000', 'Sales', '2022-08-20');

-- Dữ liệu mẫu cho bảng người dùng
INSERT INTO users (username, password, role) 
VALUES 
('admin', 'adminpassword', 'admin'),
('sales01', 'salespassword', 'employee');

-- Thêm dữ liệu mẫu cho bảng laptops
INSERT INTO laptops (brand, model, price, stock_quantity, specs, release_date) 
VALUES 
('HP', 'Spectre x360', 1400.00, 25, 'Intel i7, 16GB RAM, 512GB SSD, 13.3" 4K OLED', '2023-02-01'),
('Lenovo', 'ThinkPad X1 Carbon', 1500.00, 15, 'Intel i7, 16GB RAM, 1TB SSD, 14" FHD', '2022-05-10'),
('Acer', 'Swift 3', 900.00, 60, 'Intel i5, 8GB RAM, 512GB SSD, 14" FHD', '2023-04-25'),
('MSI', 'Stealth 15M', 1800.00, 20, 'Intel i9, 32GB RAM, 1TB SSD, NVIDIA RTX 3070, 15.6" FHD 144Hz', '2023-06-18'),
('Apple', 'MacBook Pro M2', 2500.00, 35, 'Apple M2, 16GB RAM, 512GB SSD, 14" Retina Display', '2024-01-05'),
('Dell', 'Inspiron 15', 850.00, 50, 'Intel i5, 8GB RAM, 256GB SSD, 15.6" FHD', '2023-07-14'),
('Asus', 'ROG Strix G15', 2000.00, 18, 'AMD Ryzen 9, 32GB RAM, 1TB SSD, NVIDIA RTX 3080, 15.6" FHD 300Hz', '2024-03-10'),
('Microsoft', 'Surface Laptop 4', 1600.00, 12, 'Intel i7, 16GB RAM, 512GB SSD, 13.5" PixelSense Display', '2023-08-01'),
('LG', 'Gram 17', 1700.00, 22, 'Intel i7, 16GB RAM, 1TB SSD, 17" WQXGA', '2022-12-22'),
('Huawei', 'MateBook X Pro', 1300.00, 28, 'Intel i7, 16GB RAM, 512GB SSD, 13.9" 3K Touchscreen', '2023-11-15');

-- Thêm dữ liệu mẫu cho bảng customers
INSERT INTO customers (name, email, phone, address, registration_date) 
VALUES 
('Nguyen Van C', 'nvc@example.com', '0909000001', '789 Tran Hung Dao, Da Nang', '2024-09-10'),
('Le Thi D', 'ltd@example.com', '0909000002', '321 Hai Ba Trung, Hai Phong', '2024-09-15'),
('Pham Minh E', 'pme@example.com', '0909000003', '654 Quang Trung, Can Tho', '2024-09-18');

-- Thêm dữ liệu mẫu cho bảng orders
INSERT INTO orders (customer_id, order_date, total_amount, status) 
VALUES 
(1, '2024-09-22', 2500.00, 'Completed'),
(2, '2024-09-23', 1400.00, 'Completed'),
(3, '2024-09-24', 1800.00, 'Pending');

-- Thêm dữ liệu mẫu cho bảng order_details
INSERT INTO order_details (order_id, laptop_id, quantity, price) 
VALUES 
(1, 5, 1, 2500.00), -- MacBook Pro M2
(2, 1, 1, 1400.00), -- HP Spectre x360
(3, 4, 1, 1800.00); -- MSI Stealth 15M

-- Thêm dữ liệu mẫu cho bảng employees
INSERT INTO employees (name, email, phone, position, hire_date)
VALUES 
('Tran Van F', 'tvf@example.com', '0909000004', 'Technician', '2022-07-15'),
('Do Thi G', 'dtg@example.com', '0909000005', 'Sales', '2023-01-20');
