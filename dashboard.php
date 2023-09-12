<?php
session_start ();

include ('plug-in/po_status_pie_graph.php');
include ('plug-in/po_weight_pie_graph.php');
$users = include ('plug-in/show-users.php');
if (!isset($_SESSION['user'])) header('location: login.php');
$user = $_SESSION['user'];
$username = $user['first_name'];


?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<html lang="en">
<head>
<title>Dashboard</title>
<style>
    p.userCount{
        text-align: center;
        font-size:15px;
        text-transform: uppercase;
        color: #f68a51;
    }
    div.col50{
    width: 50%;
   
    }
    p.highcharts-description{
        text-align: center;
    }
    div.dashboard_content_main{
        display: flex;
    flex-direction: row;
    }
    .highcharts-description {
    font-size: 16px; 
    font-weight: bold; 
    color: #333; 
    margin-bottom: 10px; 
  
}

</style>
<link rel="stylesheet" type= "text/css" href="css/login.css"> 
<script src="https://kit.fontawesome.com/4bc7e518dd.js" crossorigin="anonymous"></script>

<body>
    <div id="dashboardMainContainer">
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
            <p class="userCount"> <strong> Customers: <?= count($users)?> </strong> </p>
                <div class="dashboard_content_main">
                   <div class="col50">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description" >
                            
Creating a graph to depict the payment modes used by customers on a specific day provides valuable insights for Novero LPG Trading. Novero LPG Trading is a company engaged in the distribution and trading of liquefied petroleum gas (LPG). By analyzing payment data for a particular day, Novero LPG Trading can better understand customer preferences when it comes to settling their transactions.
                        </p>
                    </figure>
                   </div>
                   <div class="col50"   >
                    <figure class="highcharts-figure">
                        <div id="containerBarChart"></div>
                        <p class="highcharts-description" >
                        By plotting LPG weight sales data for a particular day, the company can gain valuable insights into product demand trends. This analysis allows Novero LPG Trading to understand which LPG weight categories are most popular among customers, whether it's small 2.7kg cylinders, larger 11kg cylinders, or industrial-sized 22kg cylinders.
                        </p>
                    </figure>
                   </div>

                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"> </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
       var graphData = <?= json_encode($results) ?>;
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Daily Sales Record',
            align: 'left'
        },
        tooltip: {
            pointFormatter:function(){
                var point = this,
                    series = point.series;

                    return  `<b>${point.name} </b>: ${point.y}`
            }
        },
            credits: {
            enabled: false
        },
        
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} '
                },
                colors: ['#2196F3', '#F44336', '#673AB7']
            }
        },
        series: [{
            name: 'Mode of Payment',
            colorByPoint: true,
            data: graphData
        }]
    });

    </script>


<script>
    var graphData = <?= json_encode($results1) ?>;
    Highcharts.chart('containerBarChart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Daily Weight Records',
            align: 'left'
        },
        tooltip: {
            pointFormatter:function(){
                var point = this,
                    series = point.series;

                    return  `<b>${point.name} </b>: ${point.y}`
            }
        },
            credits: {
            enabled: false
        },
        
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} '
                },
                colors: ['#007ACC', '#4D8FB8', '#A5CFF1']
            }
        },
        series: [{
            name: 'Weight Sales',
            colorByPoint: true,
            data: graphData
        }]
    });
    
    
</script>
</body> 
</html>