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
$sql_app = "select count(id) as sumapp from jobsapplied_db where companyname = '$company_name'";
$result_app = mysqli_query($con,$sql_app);
$row_app = mysqli_fetch_array($result_app);

$sumapp = $row_app['sumapp'];

$sql_job = "select count(id) as sumjob from jobs_db where companyname = '$company_name'";
$result_job = mysqli_query($con,$sql_job);
$row_job = mysqli_fetch_array($result_job);

$sumjob = $row_job['sumjob'];


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
                <div class="row pie">
                    <div class="col-sm-12">
                        <center>
                            <div id="piechart" style="background-color: transparent !important;"></div>
                        </center>
        
                    </div>
                </div>
            </div>
        </div>
        
        <!-- /#page-content-wrapper -->

    </div>
    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Details', 'Total'],
                ['Applications', <?php echo $sumapp; ?>],
                ['Jobs Posted', <?php echo $sumjob; ?>]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {
                'title': 'Reports',
                'width': 600,
                'height': 600
            };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
    <!-- /#wrapper -->
    <!-- partial -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
    <script src="../js/company.js"></script>

</body>

</html>