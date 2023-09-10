<?php
    $data=$_POST;
    $user_id = (int) $data ['user_id'];
    $name = $data ['name'];
    

    try {
        include('connection.php'); 
    
       
        $command = "DELETE FROM sales WHERE id={$user_id}";

      
        $conn ->exec($command);

        echo json_encode([
            'success' => true,
            'message' => $name . ' User Successfully deleted.'
        ]);
    
        
    } catch (PDOException $e) {
        return json_encode([
            'success' => false,
            'message' => 'Error deleting user.'
        ]);
     
    }
    ?>