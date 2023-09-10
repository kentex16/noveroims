<?php
$username = $user['first_name'];
?>
<div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo" id="dashboard_logo"> LPG</h3>
            <div class="dashboard_sidebar_user">

            <?php if ($username == 'Irvin'): ?>
                    <img src="images/Toto.jpg" alt="user image" id="userImage" />
                <?php elseif ($username == 'Edener'): ?>
                    <img src="images/Payat.jpg" alt="user image" id="userImage" />
                <?php elseif ($username == 'Erwin'): ?>
                    <img src="images/Erwin.jpg" alt="user image" id="userImage" />
                <?php elseif ($username == 'Kenneth'): ?>
                    <img src="images/Kenneth.jpg" alt="user image" id="userImage" />
                <?php elseif ($username == 'Kristian'): ?>
                    <img src="images/Kristian.jpg" alt="user image" id="userImage" />
                <?php endif; ?>
                <span><?php echo $username; ?></span>
            </div>

            <div class="dashboard_sidebar_menus">  
                <ul class="dashboard_menu_lists">
                    <li>
                        <a href="dashboard.php" > <i class="fa fa-dashboard" > </i> <span class="menuText"> Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="users_add.php" > <i class="fa fa-plus" > </i> <span class="menuText"> Add Sales</span> </a>
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