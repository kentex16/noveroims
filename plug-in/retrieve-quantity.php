<?php
session_start();
if (isset($_POST['retrieve'])) {
    try {
        // Include the database connection file
        include('connection.php');

        // Your SQL query
        $sql = "INSERT INTO promo (customer_name, quantity_purchased)
        SELECT name, COUNT(*) AS quantity_purchased
        FROM sales
        GROUP BY name;";

        // Execute the SQL query using the $conn object (assuming that's your connection object)
        $conn->exec($sql);

        echo '<script>alert("Quantity Added successfully.");</script>';
        
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    }
}
?>
