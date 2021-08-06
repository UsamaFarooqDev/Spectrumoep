<?php
@include('../php/connection.php');
session_start();
if (isset($_SESSION['companyemail'])) {
    $email = $_SESSION['companyemail'];
}
$sql = "select * from company_db where email ='$email'";
$result = mysqli_query($con,$sql);
$row_company = mysqli_fetch_array($result);
$company_name = $row_company['companyname'];
$select_post = "select * from jobs_db where companyname = '$company_name' ";
$result_job = mysqli_query($con, $select_post);

$sql_app = "select count(id) as sumapp from jobsapplied_db where companyname = '$company_name'";
$result_app = mysqli_query($con,$sql_app);
$row_app = mysqli_fetch_array($result_app);

$sumapp = $row_app['sumapp'];

$sql_job = "select count(id) as sumjob from jobs_db where companyname = '$company_name'";
$result_jobb = mysqli_query($con,$sql_job);
$row_jobb = mysqli_fetch_array($result_jobb);

$sumjob = $row_jobb['sumjob'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Spectrum Staffing Solutions</title>

    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css'>
    <link rel="stylesheet" href="../css/company.css">
    <link rel="stylesheet" href="../css/companynav.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <div class="sidebar-header">
                    <div class="sidebar-brand">
                        <a href="#">Spectrum Staffing Solutions</a>
                    </div>
                </div>
                <li><a href="home.php">Home</a></li>
                <li><a href="applications.php">Applications</a></li>
                <li><a href="postjob.php">Post Job</a></li>
                <li><a href="charts.php">Charts</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="index.html">Logout</a></li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 b1 text-center align-items-center">
                        <h3>Jobs Posted</h3>
                        <h4><?php echo $sumjob; ?></h4> <br><br><br>
                        <a href="home.php" class="btn btn-info">View More</a>
                    </div>
                    <div class="col-sm-4 b2 text-center">
                        <h3>Applications Recieved</h3>
                        <h4><?php echo $sumapp; ?></h4> <br><br><br>
                        <a href="applications.php" class="btn btn-info">View More</a>
                    </div>
                    <div class="col-sm-4 b3 text-center">
                        <h3>Post A New Job</h3>
                        <h4></h4> <br><br><br>
                        <a href="postjob.php" class="btn btn-info">Post</a>
                    </div>
                </div>
                <br>
                    <div class="row ">
                        <div class="col-sm-1 col-5 header_profile text-center ">
                            <h3>Latest Posts</h3>
                        </div>
                        <div class="col-sm-7 col-7 text-left" id="latest_jobs">


                            <table class="table table-striped table-light table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_job = mysqli_fetch_array($result_job)) {

                                    ?>
                                        <tr>
                                            <td><?php echo $row_job['title']; ?></td>
                                            <td><?php echo $row_job['description']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- <section className="jobs">
                                <a href=""></a> <br/>
                                <p>
                                </p>
                                <a href="" class="btn btn-info">Visit</a>
                            </section> -->
                            <br>
                        </div>
                        <div class="col-sm-1 col-5 header_profile text-center ">
                            <h3>Latest Hiring</h3>
                        </div>
                        <div class="col-sm-3 col-7" id="latest_jobs">
                            
                            <table class="table table-striped table-light table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $fetch_emp = "select * from hire_db where companyname = '$company_name'";
                                    $result_emp = mysqli_query($con,$fetch_emp);
                                    while($row_emp = mysqli_fetch_array($result_emp))
{
                                    ?>
                                    <tr>
                                        <td><?php echo $row_emp['username'] ?></td>
                                        <td><?php echo $row_emp['title'] ?></td>
                                    </tr>
                                    <?php
}
?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
            </div>
        </div>

        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- partial -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
    <script src="../js/company.js"></script>

</body>

</html>