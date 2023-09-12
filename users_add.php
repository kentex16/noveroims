<?php
session_start ();
if (!isset($_SESSION['user'])) header('location: login.php');
$SESSION['table'] = 'sales';
$user = $_SESSION['user'];

?>


<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<html lang="en">
<head>
<title>Add User</title>
<link rel="stylesheet" type= "text/css" href="css/login.css"> 
<script src="https://kit.fontawesome.com/4bc7e518dd.js" crossorigin="anonymous"></script>
<body>
    <div id="dashboardMainContainer">
        <?php include ('partial/app-sidebar.php') ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include ('partial/app-topnav.php') ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div id="userAddFormContainer">
                    <form action="plug-in/add.php" method="POST" class="appForm">
                    <div class="appFormInputContainer">
                        <label for="name">Name</label>
                         <input type="text" class="appFormInput" id="name" name="name" />
                    </div>
                    <div class="appFormInputContainer">
                        <label for="mop">MOP</label>
                        <select id="mop"  class="appFormInput" name="mop">
                            <option value="Cash">Cash</option>
                            <option value="Gcash">Gcash</option>
                            <option value="Credit">Credit</option>
                        </select>
                    </div>
                    <div class="appFormInputContainer"> 
                        <label for="weight">Weight</label>
                        <select id="weight" class="appFormInput"  name="weight">
                            <option value="2.7kg">2.7kg</option>
                            <option value="11kg">11kg</option>
                            <option value="22kg">22kg</option>
                        </select>
                    </div>
                    <div class="appFormInputContainer">
                        <label for="amount">Amount</label>
                        <input type="text" class="appFormInput" id="amount" name="amount" />
                    </div>
                    <div class="appFormInputContainer">
                        <label for="cylinder">Returned Cylinder?</label>
                        <input type="checkbox" class="appFormCheckBox" id="cylinder" name="cylinder" />
                    </div>
                        <button type="submit"> <i class="fa fa-plus"></i> Add </button>
                    </form>
                    <?php
                    if (isset($_SESSION ['response'])) { 
                        $response_message = $_SESSION['response']['message'];
                        $is_success = $_SESSION['response']['success'];
                        ?>
                    <div class="responseMessage">
                             <p class="responseMessage <?= $is_success ? 'responseMessage_success' :'responseMesssage_error' ?>">
                             <?= $response_message ?>
                            </p>
                    </div>
                    <?php unset($_SESSION['response']); }?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"> </script>
</body> 
</html>