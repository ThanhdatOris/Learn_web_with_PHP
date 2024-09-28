<?php
// Database connection function
function connectDB() {
    $host = '127.0.0.1';
    $db = 'laptop_store';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

// Fetch all records from a table
function fetchAll($table) {
    $pdo = connectDB();
    $stmt = $pdo->query("SELECT * FROM $table");
    return $stmt->fetchAll();
}

// Fetch a single record by ID
function fetchById($table, $id) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Insert a new record
function insertRecord($table, $data) {
    $pdo = connectDB();
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), '?'));
    $stmt = $pdo->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
    return $stmt->execute(array_values($data));
}

// Update an existing record
function updateRecord($table, $data, $id) {
    $pdo = connectDB();
    $columns = implode(" = ?, ", array_keys($data)) . " = ?";
    $stmt = $pdo->prepare("UPDATE $table SET $columns WHERE id = ?");
    return $stmt->execute(array_merge(array_values($data), [$id]));
}

// Delete a record by ID
function deleteRecord($table, $id) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("DELETE FROM $table WHERE id = ?");
    return $stmt->execute([$id]);
}
?>