<?php
session_start ();
if (!isset($_SESSION['user'])) header('location: login.php');
$user = $_SESSION['user'];
$SESSION['table'] = 'sales';
$users = include ('plug-in/show-sales.php');
$username = $user['first_name'];
?>


<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<html lang="en">
<head>
<title>Dashboard</title>
<style>
       
        .hamburger-menu .menu ul {
            text-align: center;
        }

       
        .hamburger-menu .menu button {
            padding: 10px 20px;
            margin: 5px;
            background-color: #007bff; 
            color: #fff; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }

        
        .hamburger-menu .menu button:hover {
            background-color: #0056b3; 
        }
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
                                        <th>Sales Date</th>
                                        <th>Total Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($users as $index => $user){?>
                                            <tr>
                                            <td> <?= $index + 1 ?> </td>
                                            <td class="sale_date"><?= $user ['sale_date'] ?></td>
                                            <td class="total_sales"><?= $user ['total_sales'] ?></td>
                                            <td>
                                            
                                            </td>

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
        <div class="hamburger-menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="menu">
                <ul text-decoration="none">
                    <button class="export-png">Export as PNG</button>
                    <button class="export-jpeg">Export as JPEG</button>
                    <button class="export-excel">Export as XLS</button>
                    <button class="fullscreen">View Fullscreen</button>
                    <button class="print">Print Table</button>
                                            
                

                </ul>
            </div>
        </div>
              

    </div>
    <script src="js/script.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.hamburger-menu').addEventListener('click', function () {
    var menu = document.querySelector('.menu');
    menu.classList.toggle('visible'); // Add or remove the 'visible' class
        });

        document.querySelector('.menu').addEventListener('click', function (event) {
            var target = event.target;
            
              function exportTableAsPNG() {
            var table = document.querySelector('.users table');

            // Create a transparent overlay div
            var overlay = document.createElement('div');
            overlay.style.position = 'absolute';
            overlay.style.top = '0';
            overlay.style.left = '0';
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'rgba(255, 255, 255, 0.5)'; // Transparent white overlay
            document.body.appendChild(overlay);

            // Capture the table with the overlay
            html2canvas(table).then(function (canvas) {
                // Remove the overlay
                document.body.removeChild(overlay);

                // Export the table as an image
                var image = canvas.toDataURL('image/png');  
                var downloadLink = document.createElement('a');
                downloadLink.href = image;
                downloadLink.download = 'table.png';
                downloadLink.click();
            });
        }
                function exportTableAsJPEG() {
                    var table = document.querySelector('table');
                    html2canvas(table).then(function (canvas) {
                        var imgData = canvas.toDataURL('image/jpeg');
                        var link = document.createElement('a');
                        link.href = imgData;
                        link.download = 'table.jpg';
                        link.click();
                    });
                }



            function exportTableAsPDF() {
                var table = document.querySelector('.users table');
                html2canvas(table).then(function (canvas) {
                    var pdf = new jsPDF('p', 'mm', 'a4');
                    var imgWidth = 210;
                    var imgHeight = (canvas.height * imgWidth) / canvas.width;
                    pdf.addImage(canvas.toDataURL('image/jpeg', 1), 'JPEG', 0, 0, imgWidth, imgHeight);
                    pdf.save('table.pdf');
                });
            }
            function toggleFullscreen(element) {
                if (!document.fullscreenElement) {
                    element.requestFullscreen().catch(err => {
                        console.error('Error attempting to enable full-screen mode:', err);
                    });
                } else {
                    document.exitFullscreen();
                }
            }

            document.querySelector('.fullscreen').addEventListener('click', function () {
                var table = document.querySelector('.users table');
                toggleFullscreen(table);
            });

            document.querySelector('.print').addEventListener('click', function () {
                // Open the browser's print dialog
                window.print();
            });

            if (target.classList.contains('export-png')) {
                exportTableAsPNG();
            } else if (target.classList.contains('export-jpeg')) {
                exportTableAsJPEG();
            } else if (target.classList.contains('export-excel')) {
                exportTableAsPDF();
            } else if (target.classList.contains('fullscreen')) {
                // Implement the code for entering fullscreen mode
                // ...
            } else if (target.classList.contains('print')) {
                // Implement the code for printing the table
                // ...
            }
            
        });
    });
</script>
<script>
    document.getElementById('clearTable').addEventListener('click', function (e) {
    e.preventDefault();
    resetDatabase();
});

// Function to reset the database
function resetDatabase() {
    BootstrapDialog.confirm({
        type: BootstrapDialog.TYPE_DANGER,
        message: 'Are you sure you want to clear the sales data? This action cannot be undone.',
        callback: function (isReset) {
            if (isReset) {
                $.ajax({
                    method: 'POST',
                    url: 'reset_database.php', // Path to your reset script
                    dataType: 'json',
                    success: function (data) {
                        if (data.success) {
                            BootstrapDialog.alert({
                                type: BootstrapDialog.TYPE_SUCCESS,
                                title: 'Database Cleared',
                                message: data.message,
                                callback: function () {
                                    location.reload(); // Refresh the page after reset
                                }
                            });
                        } else {
                            BootstrapDialog.alert({
                                type: BootstrapDialog.TYPE_DANGER,
                                title: 'Error',
                                message: data.message,
                            });
                        }
                    }
                });
            }
        }
    });
}

</script>
    </body>
    </html>