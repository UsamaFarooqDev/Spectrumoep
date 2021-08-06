<?php
@include('../php/connection.php');
session_start();
if(isset($_SESSION['adminname'])){
    $name = $_SESSION['adminname'];
}
if(isset($_POST['viewclient'])){
    $clientid = $_POST['clid'];
    $client_details = "select * from client_db where ID = '$clientid'";
    $result_cl = mysqli_query($con,$client_details);
    $row_cl = mysqli_fetch_array($result_cl);
}



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
                            <a href="home.php" >
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                <span class="badge badge-pill badge-warning">New</span>
                            </a>
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
            <div class="container-fluid" id="detail_form">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <img src="../images/clients/<?php echo $row_cl['pic']; ?>" alt="">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Client Name: <font><small><em><?php echo $row_cl['fname']; ?></em></small></font></h4>
                    </div>
                    <div class="col-sm-6">
                        <h4>Degree: <font><small><em><?php echo $row_cl['degree']; ?></em></small></font></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Contact: <font><small><em><?php echo $row_cl['contact']; ?></em></small></font></h4>
                    </div>
                    <div class="col-sm-6">
                        <h4>Email: <font><small><em><?php echo $row_cl['email']; ?></em></small></font></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Institute: <font><small><em><?php echo $row_cl['institute']; ?></em></small></font></h4>
                    </div>
                </div>
            </div>


        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <!-- partial -->
   
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
    <script src="../js/script.js"></script>

</body>

</html>