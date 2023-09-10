<?php


    $data=$_POST;
    $user_id = (int) $data ['userId'];
    $name = $data ['name'];
    $mop = $data ['mop'];
    $weight =$data ['weight'];
    $amount = $data ['amount'];
    $cylinder =$data ['cylinder'];
    
    
    try {
        include('connection.php'); 
        $sql ="UPDATE sales SET name=?, mop=?, weight=?, amount=?, cylinder=? WHERE id=?";
        $conn ->prepare($sql)->execute([$name,$mop,$weight,$amount,$cylinder,$user_id]);
        echo json_encode([
            'success' => true,
            'message' => $name . ' User Successfully updated.'
        ]);
    
        
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error updating user.'
        ]);
     
    }
    ?>