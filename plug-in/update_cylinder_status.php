<?php
session_start();
include('connection.php'); // Include your database connection script

if (!isset($_SESSION['user'])) {
    exit(json_encode(['success' => false, 'message' => 'User not authenticated.']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = isset($_POST['userId']) ? (int)$_POST['userId'] : 0;

    if ($userId > 0) {
        try {
            // Update the "cylinder" field to 1 (Returned)
            $sql = "UPDATE archived_sales SET cylinder = 1 WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$userId]);

            $salesql = "UPDATE sales SET cylinder = 1 WHERE id = ?";
            $stmt = $conn->prepare($salesql);
            $stmt->execute([$userId]);

            exit(json_encode(['success' => true, 'message' => 'Cylinder returned']));
        } catch (PDOException $e) {
            exit(json_encode(['success' => false, 'message' => 'Error updating cylinder status: ' . $e->getMessage()]));
        }
    } else {
        exit(json_encode(['success' => false, 'message' => 'Invalid user ID.']));
    }
} else {
    exit(json_encode(['success' => false, 'message' => 'Invalid request method.']));
}
?>
