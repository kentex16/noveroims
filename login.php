<?php
session_start();
 $error_message = '';

if ($_POST){
    include ('plug-in/connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM  users WHERE users.email="'. $username .'" AND users.password = "'.  $password .'" LIMIT 1';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll()[0];
        $_SESSION['user'] = $user;

        header ('Location: dashboard.php');
    } else $error_message = 'Please ensure that the credentials is correct.';

}
?>


<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<html lang="en">
<head>
<title>Inventory</title>
<link rel="stylesheet" type= "text/css" href="css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<style>
    /* Style for the Back button */
.backButton {
  display: inline-block;
  padding: 10px 20px;
  background-color: #fff; /* Set your desired background color */
  color: #f68a1f; /* Text color */
  text-decoration: none;
  border-radius: 5px;
  font-size: 16px;
  font-weight: bold;
  transition: background-color 0.3s ease; /* Add a smooth hover effect */
}

/* Style for the FontAwesome icon inside the button */
.backButton i.fa {
  margin-right: 5px; /* Add some spacing between the icon and text */
}

/* Hover effect for the button */
.backButton:hover {
  background-color: #0056b3; /* Change the background color on hover */
}

</style>
<body id="loginBody">
    <div class="container">
        <div class="loginHeader">
            <h1> NOVERO</h1>
            <h3> LPG TRADING</h3>
</div>
<div class ="loginBody">
    <form action="login.php" method ="POST">
        <a href="index.php" class="backButton"> <i class="fa fa-backward" > </i></a>
        <div class="loginInputsContainer">    
        
            <?php if (!empty($error_message)) { ?>
        <p> <strong  style="color: red;"> <?= $error_message  ?> </strong> </p>
        <?php }?>
            <label for="inputField1">USERNAME</label>
            <input placeholder="Username" type ="text" id="inputField1" name="username"/>
        </div>
        <div class="loginInputsContainer">
            <label for="inputField2">PASSWORD</label>
            <input placeholder="Password" type ="password" id="inputField2" name="password"/>
        </div>
        <div class ="loginButtonContainer">
            <button type="submit"> Login</button>
        </div>
    </form>
</div>
</div>
</body>
</html>