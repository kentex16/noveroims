<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=inventory", $username, $password);

    // Set PDO to throw exceptions for errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define the SQL statement to truncate (delete all data) from the "sales" table
    $sqlSalesReset = "TRUNCATE TABLE sales";

    // Execute the SQL statement
    $conn->exec($sqlSalesReset);

    $response = [
        'success' => true,
        'message' => 'Sales data cleared successfully.'
    ];
} catch (PDOException $e) {
    $response = [
        'success' => false,
        'message' => 'Error clearing sales data: ' . $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header('location: dashboard.php');
?>
