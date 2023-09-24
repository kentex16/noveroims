<?php
session_start();
if (isset($_POST['reset'])) {
    try {
        // Include the database connection file
        include('connection.php');

        // Your SQL query
        $sql = "TRUNCATE TABLE sales;";

        // Execute the SQL query using the $conn object (assuming that's your connection object)
        $conn->exec($sql);

        echo '<script>alert("Sucessfully deleted.");</script>';
        
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    }
}
?>
