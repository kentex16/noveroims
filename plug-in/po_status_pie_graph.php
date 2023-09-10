<?php
include('connection.php');
$statuses = ['Cash', 'Gcash', 'Credit'];
$results = [];
foreach ($statuses as $mop) {
    $stmt = $conn->prepare("SELECT COUNT(*) as mop_count FROM sales WHERE sales.mop = '" . $mop . "'");
    $stmt->execute();
    $row = $stmt->fetch();

    $count = $row['mop_count'];

    $results []= [
        'name' => strtoupper($mop),
        'y' => $count
 
    ];
}


?>