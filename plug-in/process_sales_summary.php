<?php
session_start();
if (isset($_POST['generate_summary'])) {
    try {
        // Include the database connection file
        include('connection.php');

        // Your SQL query
        $sql = "INSERT INTO daily_sales_summary (sale_date, total_sales)
                SELECT sale_date, SUM(amount) AS total_sales
                FROM sales
                WHERE mop != 'Credit'
                GROUP BY sale_date";

        // Execute the SQL query using the $conn object (assuming that's your connection object)
        $conn->exec($sql);

        echo '<script>alert("Sales summary generated successfully.");</script>';
        
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    }
}
?>
