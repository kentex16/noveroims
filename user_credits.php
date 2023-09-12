<?php
session_start ();
if (!isset($_SESSION['user'])) header('location: login.php');
$user = $_SESSION['user'];
$SESSION['table'] = 'sales';
$users = include ('plug-in/show-archived.php');
$username = $user['first_name'];
?>


<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<html lang="en">
<head>
<title>Dashboard</title>
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
                </ul>
            </div>
        </div>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <div class="dashboard_topNav">
                <a href="" title="Menu" id="toggleBtn"> <i class="fa fa-navicon"> </i> </a>
                <a href="plug-in/logout.php" id="logoutBtn"> <i class="fa fa-power-off"> </i> Logout </a>
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
                                        <th>Name</th>
                                        <th>Mop</th>
                                        <th>Weight</th>
                                        <th>Amount</th>
                                        <th>Cylinder Returned?</th>
                                        <th>Function</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $index = 0; // Initialize an index variable
                                    foreach ($users as $user) {
                                        // Check if the 'mop' field is equal to 'credit'
                                        if ($user['mop'] == 'Credit') {
                                            $index++; // Increment the index only for 'credit' users
                                            ?>
                                            
                                                <tr>
                                                    <td><?= $index ?></td>
                                                    <td class="name"><?= $user['name'] ?></td>
                                                    <td class="mop"><?= $user['mop'] ?></td>
                                                    <td class="weight"><?= $user['weight'] ?></td>
                                                    <td class="amount"><?= $user['amount'] ?></td>
                                                    <td class="cylinder">
                                                        <?php if ($user['cylinder'] == 1): ?>
                                                            Returned
                                                        <?php else: ?>
                                                            Not Returned
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($user['mop'] == 'Credit'): ?>
                                                            <button class="btn btn-success paidUser" data-userid="<?= $user['id'] ?>">Paid</button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </body> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="js/script.js"> </script>
    <script src="js/jquery/jquery-3.7.1.js"> </script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready(function () {
        // Handle "Paid" button click to change payment method to "Cash"
        $('.paidUser').click(function (e) {
            e.preventDefault();

            // Get the user ID from the data attribute
            var userId = $(this).data('userid');
            var paymentMethodElement = $(this).closest('tr').find('.payment-method');

            // Send an AJAX request to update the payment method to "Cash"
            $.ajax({
                type: 'POST',
                url: 'plug-in/update_payment_method.php', // Replace with your actual update script
                data: { userId: userId, paymentMethod: 'Cash' },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        // Update the displayed payment method to "Cash" in real-time
                        paymentMethodElement.text('Cash');

                        // Show a BootstrapDialog success alert
                        BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_SUCCESS,
                            message: 'The user is now paid',
                        });
                    } else {
                        BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            message: 'Error updating payment method: ' + response.message,
                        });
                    }
                },
                error: function () {
                    BootstrapDialog.alert({
                        type: BootstrapDialog.TYPE_DANGER,
                        message: 'Error updating payment method. Please try again later.',
                    });
                }
            });
        });
    });
</script>

</html>