<?php
// Handle AJAX requests here
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Example: Respond with a JSON object
    $response = ['status' => 'success', 'message' => 'AJAX request handled'];
    echo json_encode($response);
    exit;
}
?>