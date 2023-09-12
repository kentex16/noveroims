<?php
include('connection.php');
$weight1 = ['2.7kg', '11kg', '22kg'];
$results1 = [];

foreach ($weight1 as $weight) {
    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("SELECT COUNT(*) as mop_count FROM sales WHERE sales.weight = ?");
    $stmt->bindParam(1, $weight);
    $stmt->execute();
    $row = $stmt->fetch();

    $count = $row['mop_count'];

    $results1 []= [
        'name' => strtoupper($weight),
        'y' => $count
    ];
}
?>
