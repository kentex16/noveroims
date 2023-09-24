<?php
session_start ();
if (!isset($_SESSION['user'])) header('location: login.php');
$user = $_SESSION['user'];
$SESSION['table'] = 'sales';
$users = include ('plug-in/show-quan-user.php');
$username = $user['first_name'];
?>


<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<html lang="en">
<head>
<title>Dashboard</title>
<style>
        table{
        width:100% !important;
        display: table !important;
        border-collapse: collapse;
        font-size: 12px;
        background-color: white;
    }
    </style>
<link rel="stylesheet" type= "text/css" href="css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://kit.fontawesome.com/4bc7e518dd.js" crossorigin="anonymous"></script>
<body>
    <div id="dashboardMainContainer">
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo" id="dashboard_logo"> <strong> LPG </strong></h3>
            <div class="dashboard_sidebar_user">

            <?php if ($username == 'Irvin'): ?>
                    <img src="images/Toto.jpg" alt="user image" id="userImage" />
                <?php elseif ($username == 'Edener'): ?>
                    <img src="images/Payat.jpg" alt="user image" id="userImage" />
                <?php elseif ($username == 'Kenneth'): ?>
                    <img src="images/Kenneth.jpg" alt="user image" id="userImage" />
                <?php elseif ($username == 'Kristian'): ?>
                    <img src="images/Kristian.jpg" alt="user image" id="userImage" />
                <?php elseif ($username == 'Erwin'): ?>
                    <img src="images/Erwin.jpg" alt="user image" id="userImage" />
                <?php endif; ?>
                <span><?php echo $username; ?></span>
            </div>
            
            <div class="dashboard_sidebar_menus">  
                <ul class="dashboard_menu_lists">
                    <li>
                        <a href="dashboard.php" > <i class="fa fa-dashboard" > </i> <span class="menuText"> Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="users_add.php"> <i class="fa fa-plus" > </i>  <span class="menuText"> Add Sales</span></a>
                    </li>
                    <li>
                        <a href="users_list.php"> <i class="fa fa-scale-unbalanced-flip" > </i>  <span class="menuText"> Daily Sales</span></a>
                    </li>
                    <li>
                        <a href="user_credits.php"> <i class="fa fa-credit-card" > </i>  <span class="menuText"> Credits </span></a>
                    </li>
                    <li>
                        <a href="user_cylinder.php"> <i class="fa fa-gas-pump" > </i>  <span class="menuText"> Cylinder </span></a>
                    </li>
                    <li>
                        <a href="promos.php"> <i class="fa fa-list" > </i>  <span class="menuText"> Promos </span></a>
                    </li>
                    <li>
                        <a href="product_add.php"> <i class="fa fa-plus" > </i>  <span class="menuText"> Product </span></a>
                    </li>
                    <li>
                        <a href="product-view.php"> <i class="fa fa-plus" > </i>  <span class="menuText"> Stocks </span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <div class="dashboard_topNav">
                <a href="" title="Menu" id="toggleBtn"> <i class="fa fa-navicon"> </i> </a>
                <a href="plug-in/logout.php" id="logoutBtn"> <i class="fa fa-power-off"> </i> Logout </a>
                <div id="currentDateTime"></div>
                <div id="countdown"></div>
                <?php
                $currentTimestamp = time();

                // Add 6 hours to the current timestamp
                $currentTimestamp += 6 * 3600; // 6 hours in seconds

                $currentDateTime = date("Y-m-d H:i:s", $currentTimestamp);

                echo '<script>';
                echo 'document.getElementById("currentDateTime").textContent = "Current Date and Time   : ' . $currentDateTime . '";';
                echo '</script>';
            ?>

            </div>
            <div class="dashboard_content">
                <div class="row">
                    <div class="column">
                    <div class="section_content">
                        <div class="users">
                            <table style="margin-left: 20px;">
                    
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Customer Name</th>
                                        <th>Quantity Purchased</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($users as $index => $user){?>
                                            <tr>
                                            <td> <?= $index + 1 ?> </td>
                                            <td class="customer_name"><?= $user ['customer_name'] ?></td>
                                            <td class="quantity_purchased"><?= $user ['quantity_purchased'] ?></td>
                                           

                                         </tr>
                                    <?php } ?>
                                   
                                </tbody>
                            </table>
                        </div>
                       
                                    
                    </div>
                    </div>
                </div>
                </div>
                
                     
            </div>
            
        </div>
         
        <form method="post" action="plug-in/retrieve-quantity.php">
                    <button type="submit" name="retrieve">Retrieve</button>
                    </form>
                </ul>
            </div>
        </div>
              

    </div>
    <script src="js/script.js"> </script>
    <script src="js/jquery/jquery-3.7.1.js"> </script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body> 
</html>