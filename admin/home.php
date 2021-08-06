<?php
@include('../php/connection.php');
session_start();
if(isset($_SESSION['adminname'])){
    $name = $_SESSION['adminname'];
}
$sql_com = "select count(id) as sumcom from company_db";
$result_comp = mysqli_query($con,$sql_com);
$row_comp = mysqli_fetch_array($result_comp);
$sumcomp = $row_comp['sumcom'];

$sql_client = "select count(id) as sumclient from client_db";
$result_client = mysqli_query($con,$sql_client);
$row_client = mysqli_fetch_array($result_client);
$sumclient = $row_client['sumclient'];

$sql_job = "select count(id) as sumpost from jobs_db";
$result_job = mysqli_query($con,$sql_job);
$row_job = mysqli_fetch_array($result_job);
$sumjob = $row_job['sumpost'];

$fetch_jobs = "select * from jobs_db";
$result_fjob = mysqli_query($con,$fetch_jobs);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Spectrum Staffing Solution - Admin Site</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/admin.js"></script>

</head>

<body style="background-color: rgb(26, 26, 26);">
    <!-- partial:index.partial.html -->
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">Welcome Admin</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded"
                            src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                            alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong><?php echo $name; ?></strong>
                        </span>
                        <span class="user-role">Administrator</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar">
                            <a href="javascript:void(0)" onclick="show_dashboard()">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                <span class="badge badge-pill badge-warning">New</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="javascript:void(0)" onclick="show_companies()">
                                <i class="fa fa-suitcase"></i>
                                <span>Companies</span>
                                <span class="badge badge-pill badge-danger">3</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="javascript:void(0)" onclick="show_clients()">
                                <i class="far fa-user"></i>
                                <span>Clients</span>
                                <span class="badge badge-pill badge-danger">3</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-chart-line"></i>
                                <span>Charts</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" onclick="show_chart()">Pie chart</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-user-plus"></i>
                                <span>Admins</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" onclick="show_manageadmin()">Manage</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="show_addadmin()">Add New</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar">
                            <a href="index.html">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <small class="text-center" style="color: white;">Copyright 2021 Devop's</small>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <section id="dashboard">
                    <div class="row text-center ">
                        <div class="col-sm-4 ">
                            <section class="cards">
                                <section class="s1">
                                    <h2>Companies Registered</h2>
                                </section>
                                <section class="s2">
                                    <i class="fa fa-suitcase fa-4x"></i>
                                </section>
                                <section class="s3">
                                    <h3><?php echo $sumcomp; ?></h3>
                                </section>
                            </section>
                        </div>
                        <div class="col-sm-4 ">
                            <section class="cards">
                                <section class="s1">
                                    <h2>Clients Registered</h2>
                                </section>
                                <section class="s2">
                                    <i class="fa fa-users fa-4x"></i>
                                </section>
                                <section class="s3">
                                    <h3><?php echo $sumclient; ?></h3>
                                </section>
                            </section>
                        </div>
                        <div class="col-sm-4 ">
                            <section class="cards">
                                <section class="s1">
                                    <h2>Jobs Posted</h2>
                                </section>
                                <section class="s2">
                                    <i class="fa fa-file fa-4x"></i>
                                </section>
                                <section class="s3">
                                    <h3><?php echo $sumjob; ?></h3>
                                </section>
                            </section>
                        </div>
                    </div> <br>
                    <div class="row job_panel">
                        <div class="col-sm-12">
                            <h2 class="text-left">Latest Jobs Post</h2>
                        </div>
                    </div>
                    <div class="row job_pannel">
                        <div class="col-sm-12">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Company Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($row_fjob = mysqli_fetch_array($result_fjob))
{
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row_fjob['id']; ?></th>
                                        <td><?php echo $row_fjob['title']; ?></td>
                                        <td><?php echo $row_fjob['description']; ?></td>
                                        <td><?php echo $row_fjob['companyname']; ?></td>
                                    </tr>
                                    <?php
}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section id="companies">
                    <div class="row">
                        <div class="col-sm-12 header_home">
                            <h2 class="text-center">Companies Registered With Spectrum Staffing Solutions</h2>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Owner Name</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fetch_comp= "select * from company_db";
                                $result_fcomp = mysqli_query($con,$fetch_comp);
                                while($row_fcomp = mysqli_fetch_array($result_fcomp))
                                {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row_fcomp['ID']; ?></th>
                                    <td><?php echo $row_fcomp['companyname']; ?></td>
                                    <td><?php echo $row_fcomp['fname']; ?></td>
                                    <td>
                                        <form action="companydetail.php" method="post">
                                        <input type="hidden" name="cid" value="<?php echo $row_fcomp['ID']; ?>">
                                        <input type="submit" value="View" name="viewcompany" class="btn btn-success">
                                        </form>
                                    </td>
                                    <td>
                                    <form action="../php/action.php" method="post">
                                       <input type="hidden" name="cid" value="<?php echo $row_fcomp['ID']; ?>">
                                       <input type="submit" value="Delete" name="companydelete" class="btn btn-danger">
                                       </form>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </section>
                <section id="clients">
                    <div class="row">
                        <div class="col-sm-12 header_home">
                            <h2 class="text-center">Clients Registered With Spectrum Staffing Solutions</h2>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $fetch_cl= "select * from client_db";
                                $result_cl = mysqli_query($con,$fetch_cl);
                                while($row_cl = mysqli_fetch_array($result_cl))
                                {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row_cl['ID']; ?></th>
                                    <td><?php echo $row_cl['fname']; ?></td>
                                    <td><?php echo $row_cl['email']; ?></td>
                                    <td>
                                        <form action="clientdetail.php" method="post">
                                            <input type="hidden" name="clid" value="<?php echo $row_cl['ID']; ?>">
                                        <input type="submit" value="View" class="btn btn-success" name="viewclient">
                                        </form>
                                    </td>
                                    <td>   <form action="../php/action.php" method="post">
                                        <input type="hidden" name="clid" value="<?php echo $row_cl['ID']; ?>">
                                        <input type="submit" value="Delete" class="btn btn-danger" name="clientdelete">
                                        </form></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </section>
                <section id="chart">
                    <div class="row">
                        <div class="col-sm-12 header_home">
                            <h2 class="text-center">Pie Chart Visualization</h2>
                        </div>
                    </div>
                    <br>
                    <div class="row pie">
                        <div class="col-sm-12">
                            <center>
                                <div id="piechart"></div>
                            </center>

                        </div>
                    </div>

                </section>
                <section id="manage_admins">
                    <div class="row">
                        <div class="col-sm-12 header_home">
                            <h2 class="text-center">Manage Admins</h2>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $fetch_admin= "select * from admin_db where name != 'admin'";
                                $result_admin = mysqli_query($con,$fetch_admin);
                                while($row_admin = mysqli_fetch_array($result_admin))
                                {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row_admin['id']; ?></th>
                                    <td><?php echo $row_admin['name']; ?></td>
                                    <td><?php echo $row_admin['email']; ?></td>
                                    <td>
                                        <form action="../php/action.php" method="post">
                                    <input type="hidden" name="adminid" value="<?php echo $row_admin['id']; ?>">
                                    <input type="submit" value="Delete" class="btn btn-danger" name="admindelete">
                                    </form>
                                        
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </section>
                <section id="add_admin">
                    <div class="row">
                        <div class="col-sm-12 header_home">
                            <h2 class="text-center">Add New Admins</h2>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="offset-sm-3 col-sm-6 offset-sm-3">
                            <form action="../php/register.php" method="post" class="form">
                                <h3 class="text-center">Add New Admin</h3>
                                <label for="">Name:</label>
                                <input type="text" name="name" placeholder="Name" id="" class="form-control" required>
                                <label for="">Email:</label>
                                <input type="email" name="email" placeholder="Email" id="" class="form-control" required>
                                <label for="">Password</label>
                                <input type="password" name="pass" placeholder="********" id="" class="form-control" required>
                                <br>
                                <input type="submit" name="admin" value="Done" class="btn btn-success">
                            </form>
                        </div>
                    </div>

                </section>
            </div>


        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <!-- partial -->
    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Details', 'Total'],
                ['Companies', <?php echo $sumcomp; ?>],
                ['Clients', <?php echo $sumjob; ?>],
                ['Jobs', <?php echo $sumjob;?>]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {
                'title': 'Reports',
                'width': 900,
                'height': 600
            };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
    <script src="../js/script.js"></script>

</body>

</html>