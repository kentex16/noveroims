<?php
$data = $_POST;
$product_id = isset($data['product_id']) ? (int) $data['product_id'] : null;
$name = isset($data['name']) ? $data['name'] : null;

if ($product_id !== null) {
    try {
        include('connection.php');

        $command = "DELETE FROM products WHERE product_id = {$product_id}";

        $conn->exec($command);

        echo json_encode([
            'success' => true,
            'message' => $name . ' Product Successfully deleted.'
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error deleting product.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid or missing product_id.'
    ]);
}
?>
