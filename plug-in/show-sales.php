<?php 
include ('connection.php');

$stmt =$conn->prepare ("SELECT * FROM daily_sales_summary"); 
$stmt->execute ();
$stmt->setFetchMode(PDO::FETCH_ASSOC); 

return $stmt->fetchAll();
?>