<?php
session_start ();
if (!isset($_SESSION['user'])) header('location: login.php');
$user = $_SESSION['user'];
$SESSION['table'] = 'sales';
$users = include ('plug-in/show-users.php');
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
                                        <th>Name</th>
                                        <th>Mop</th>
                                        <th>Weight</th>
                                        <th>Amount</th>
                                        <th>Cylinder Returned?</th>
                                        <th> Function </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($users as $index => $user){?>
                                            <tr>
                                            <td> <?= $index + 1 ?> </td>
                                            <td class="name"><?= $user ['name'] ?></td>
                                            <td class="mop"><?= $user ['mop'] ?></td>
                                            <td class="weight"><?= $user ['weight'] ?></td>
                                            <td class="amount"> <?= $user ['amount'] ?> </td>
                                            <td class="cylinder">
                                                    <?php if ($user['cylinder'] == 1): ?>
                                                        Returned
                                                    <?php else: ?>
                                                        Not Returned
                                                    <?php endif; ?>
                                                </td>
                                            <td>
                                                <a href="" class="updateUser" data-userid = "<?= $user ['id'] ?>" > <i class="fa fa-pencil"></i> Edit </a>
                                                <a href="" class="deleteUser" data-userid = "<?= $user ['id'] ?>" data-name="<?=  $user ['name'] ?>" data-mop="<?=  $user ['mop'] ?>" 
                                                data-weight="<?=  $user ['weight'] ?>" data-amount ="<?=  $user ['amount'] ?>"data-cylinder="<?=  $user ['cylinder'] ?>"> <i class="fa fa-delete-left"></i> Delete
                                                </a>
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
                <button id="calculateTotalAmount" class="btn btn-primary" style ="margin-left:20px;">Calculate Total Amount</button>
                     
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
                    <button id="clearTable" class="btn btn-danger" style="margin-left: 20px;">Reset Database</button>

                

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
    
    <script>
        function script (){
            this.initialize = function (){
                this.registerEvents();
            },

            this.registerEvents =function (){
                document.addEventListener('click', function(e){
                    targetElement = e.target;

                    classList = targetElement.classList;



                    if(classList.contains('deleteUser')){
                        e.preventDefault();
                        userId = targetElement.dataset.userid;
                        name = targetElement.dataset.name;
                        mop = targetElement.dataset.mop;
                        weight=targetElement.dataset.weight;
                        amount=targetElement.dataset.amount;
                        cylinder=targetElement.datasetcylinder;
                        

                        BootstrapDialog.confirm({
                            type:BootstrapDialog.TYPE_DANGER,
                            message: 'Are you sure you want to delete ' + name + '?',
                            callback:function(isDelete){
                                    if (isDelete){
                                        $.ajax({
                                        method: 'POST',
                                        data: {
                                            user_id:userId,
                                            name: name,
                                        },
                                        url: 'plug-in/delete-user.php', 
                                        dataType: 'json',
                                        success: function(data){
                                            if (data.success){
                                            BootstrapDialog.alert({
                                                type: BootstrapDialog.TYPE_SUCCESS,
                                                message: data.message,
                                                callback: function(){
                                                    location.reload();
                                                }
                                            });
                                        } else  BootstrapDialog.alert({
                                                type: BootstrapDialog.TYPE_DANGER,
                                                message: data.message,
                                            });
                                            
                                        }
                                    });

                                    }
                                        
                                }
                            })

                        }
                
                   
                    if(classList.contains('updateUser')){
                        e.preventDefault();
                        
                       userId = targetElement.dataset.userid;
                       name = targetElement.closest('tr').querySelector('td.name').innerHTML;
                       mop =targetElement.closest('tr').querySelector('td.mop').innerHTML;
                       weight =targetElement.closest('tr').querySelector('td.weight').innerHTML;
                       amount =targetElement.closest('tr').querySelector('td.amount').innerHTML;
                       cylinder =targetElement.closest('tr').querySelector('td.cylinder').innerHTML;

                    BootstrapDialog.confirm({
                        title: 'Update now ' + name,
                                        message: '<form>\
                    <div class="form-group">\
                        <label for="name">Name</label>\
                        <input type="text" class="form-control" id="name" value="' + name + '">\
                    </div>\
                    <div class="form-group">\
                        <label for="mop">MOP</label>\
                        <select id="mop" class="form-control" value="' + mop + '">\
                            <option value="' + mop + '">' + mop + '</option>\
                            <option value="Cash">Cash</option>\
                            <option value="Gcash">Gcash</option>\
                            <option value="Credit">Credit</option>\
                        </select>\
                    </div>\
                    <div class="form-group">\
                        <label for="weight">Weight</label>\
                        <select id="weight" class="form-control" value="' + weight + '">\
                            <option value="' + weight + '">' + weight + '</option>\
                            <option value="2.7kg">2.7kg</option>\
                            <option value="11kg">11kg</option>\
                            <option value="22kg">22kg</option>\
                        </select>\
                    </div>\
                    <div class="form-group">\
                        <label for="amount">Amount</label>\
                        <input type="text" class="form-control" id="amount" value="' + amount + '"/>\
                    </div>\
                    <div class="form-group">\
                        <label for="cylinder">Returned Cylinder?</label>\
                        <input type="checkbox" class="form-control" id="cylinder" value="' + cylinder + '"/>\
                    </div>\
                </form>',
                    callback: function (isUpdate){
                        if(isUpdate){
                            $.ajax({
                                method: 'POST',
                                data: {
                                    userId:userId,
                                    name: document.getElementById('name').value,
                                    mop: document.getElementById('mop').value,
                                    weight: document.getElementById('weight').value,
                                    amount: document.getElementById('amount').value,
                                    cylinder: document.getElementById('cylinder').checked ? 1: 0,
                                    
                                },
                                url: 'plug-in/update-user.php', 
                                dataType: 'json',
                                success: function(data){
                                    if (data.success){
                                        BootstrapDialog.alert({
                                            type: BootstrapDialog.TYPE_SUCCESS,
                                            message: data.message,
                                            callback: function(){
                                                location.reload();
                                            }
                                        });
                                    } else  BootstrapDialog.alert({
                                            type: BootstrapDialog.TYPE_DANGER,
                                            message: data.message,
                                        });
                                    
                                }
                            })
                        } 
                    }

                    });
                    
                    }
                });
            }
        }
        document.getElementById('calculateTotalAmount').addEventListener('click', function (e) {
            e.preventDefault();
            calculateTotalAmount();
        });

        // Function to calculate the total amount
        function calculateTotalAmount() {
            var totalAmount = 0;

            // Iterate through the rows and calculate the total amount
            document.querySelectorAll('table tbody tr').forEach(function (row) {
                var mop = row.querySelector('td.mop').textContent;
                var amount = parseFloat(row.querySelector('td.amount').textContent);

                if (mop !== 'Credit' && !isNaN(amount)) {
                    totalAmount += amount;
                }
            });

            // Display the total amount
            BootstrapDialog.alert({
                type: BootstrapDialog.TYPE_INFO,
                message: 'Today Sale: ₱' + totalAmount.toFixed(2),
            });
        }
        

        var script = new script;
        script.initialize();
    </script>




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