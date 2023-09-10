<?php 
include ('connection.php');

$stmt =$conn->prepare ("SELECT * FROM archived_sales"); 
$stmt->execute ();
$stmt->setFetchMode(PDO::FETCH_ASSOC); 

return $stmt->fetchAll();
?>