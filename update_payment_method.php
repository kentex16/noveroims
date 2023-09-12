<?php
session_start();
if (!isset($_SESSION['user'])) {
    exit(json_encode(['success' => false, 'message' => 'User not authenticated.']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = isset($_POST['userId']) ? (int)$_POST['userId'] : 0;
    $paymentMethod = isset($_POST['paymentMethod']) ? $_POST['paymentMethod'] : '';

    if ($userId > 0 && in_array($paymentMethod, ['Cash', 'Credit'])) {
        try {
            include('connection.php'); // Include your database connection script

            // Get the values from archived_sales for the specified user
            $getDataSql = "SELECT name, mop, weight, amount, cylinder FROM archived_sales WHERE id = ?";
            $stmt = $conn->prepare($getDataSql);
            $stmt->execute([$userId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $name = $row['name'];
                $mop = $row['mop'];
                $weight = $row['weight'];
                $amount = $row['amount'];
                $cylinder = $row['cylinder'];

                // Update the user's payment method (mop) in the archived_sales table
                $updateMopSql = "UPDATE archived_sales SET mop = ? WHERE id = ?";
                $stmt = $conn->prepare($updateMopSql);
                $stmt->execute([$paymentMethod, $userId]);

                // Insert a new record in the sales table with the same values
                $updateSql = "UPDATE sales SET mop = ? WHERE id = ?";
                $stmt = $conn->prepare($updateSql);
                $stmt->execute([$paymentMethod, $userId]);

                exit(json_encode(['success' => true, 'message' => 'Payment method updated to ' . $paymentMethod]));
            } else {
                exit(json_encode(['success' => false, 'message' => 'User not found in archived_sales.']));
            }
        } catch (PDOException $e) {
            exit(json_encode(['success' => false, 'message' => 'Error updating payment method: ' . $e->getMessage()]));
        }
    } else {
        exit(json_encode(['success' => false, 'message' => 'Invalid user ID or payment method.']));
    }
} else {
    exit(json_encode(['success' => false, 'message' => 'Invalid request method.']));
}
?>
