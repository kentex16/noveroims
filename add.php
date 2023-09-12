<?php
session_start();

$name = $_POST['name'];
$mop = $_POST['mop'];
$weight = $_POST['weight'];
$amount = $_POST['amount'];
$cylinder = isset($_POST['cylinder']) ? 1 : 0;

try {
    include('connection.php'); 

    // SQL statement to insert data into both "sales" and "archived_sales" tables
    $sql = "INSERT INTO sales (`name`, `mop`, `weight`, `amount`, `cylinder`)
            VALUES (?, ?, ?, ?, ?); 
            INSERT INTO archived_sales (`name`, `mop`, `weight`, `amount`, `cylinder`)
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    // Bind parameters for the "sales" table
    $stmt->bindParam(1, $name, PDO::PARAM_STR);
    $stmt->bindParam(2, $mop, PDO::PARAM_STR);
    $stmt->bindParam(3, $weight, PDO::PARAM_STR);
    $stmt->bindParam(4, $amount, PDO::PARAM_STR);
    $stmt->bindParam(5, $cylinder, PDO::PARAM_INT);

    // Bind parameters for the "archived_sales" table
    $stmt->bindParam(6, $name, PDO::PARAM_STR);
    $stmt->bindParam(7, $mop, PDO::PARAM_STR);
    $stmt->bindParam(8, $weight, PDO::PARAM_STR);
    $stmt->bindParam(9, $amount, PDO::PARAM_STR);
    $stmt->bindParam(10, $cylinder, PDO::PARAM_INT);
    
    $stmt->execute();

    $response = [
        'success' => true,
        'message' => $name . ' successfully added to the system.'
    ];
} catch (PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header('location: ../users_add.php');
?>
