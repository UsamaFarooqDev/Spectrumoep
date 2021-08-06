<?php
@include('../php/connection.php');

session_start();
if(isset($_SESSION['clientemail'])){
$email = $_SESSION['clientemail'];
}

$fetch_jobs = "select * from jobs_db";
$result_jobs = mysqli_query($con,$fetch_jobs);

$fetch_user = "select * from client_db where email = '$email'";
$result_user = mysqli_query($con,$fetch_user);
$row_user = mysqli_fetch_array($result_user);
$name = $row_user['fname'];

$sql_app = "select count(id) as sumprop from jobsapplied_db where username = '$name'";
$result_app = mysqli_query($con,$sql_app);
$row_app = mysqli_fetch_array($result_app);

$sumprop = $row_app['sumprop'];

$sql_app = "select count(id) as sumhire from hire_db where username = '$name'";
$result_app = mysqli_query($con,$sql_app);
$row_app = mysqli_fetch_array($result_app);

$sumapp = $row_app['sumhire'];

$rem = 50-$sumprop;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/user.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="../js/user.js"></script>
    <title>Spectrum Staffing Solutions - User Home</title>
    <style>
     
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row header  text-center">
           
            <div class="col-sm-10">
                <h1>Welcome To Spectrum Staffing Solutions</h1>
            </div>
            <div class="col-sm-2">
                <a href="javascript:void(0)" class="btn btn-success" id="nav_bt" onclick="show_sidebar()">Open Menu</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 sidebar"  id="sidebar">

                <br>
                <a href="javascript:void(0)" class="btn btn-danger" id="nav_bt" onclick="hide_sidebar()">X</a>
                <br><br><br><br>
                <a href="home.php" class="form-control bt">Home</a> <br>
                <a href="invitations.php" class="form-control bt">Invitations</a> <br>
                <a href="purposals.php" class="form-control bt">Purposals Send</a> <br>
                <a href="profile.php" class="form-control bt">Profile</a> <br>
                <a href="index.html" class="form-control bt">Log Out</a> <br>
                
            </div>
            <div class=" col-sm-10 right_content">
                <br> 
                <div class="row header_right text-center">
                    <div class="col-sm-12">
                        <h1>Your Summary</h1>
                    </div>
                </div>
                <br><br>
                <div class="row" id="box">
                    <div class="col-sm-4 col-4 b1 text-center align-items-center">
                        <h2>Submitted Purposals</h2>
                        <h4><?php echo $sumprop; ?></h4> <br><br><br>
                        <a href="purposals.php" class="btn btn-info">View More</a>
                    </div>
                    <div class="col-sm-4 col-4 b2 text-center">
                        <h2>Accepted Purposals</h2>
                        <h4><?php echo $sumapp;?></h4>  <br><br><br>
                        <a href="invitations.php" class="btn btn-info">View More</a>
                    </div>
                    <div class="col-sm-4 col-4 b3 text-center">
                        <h2>Remaining Purposals</h2>
                        <h4><?php echo $rem;  ?></h4>  <br><br><br>
                        <a href="" class="btn btn-info">View More</a>
                    </div>
                </div> <br><br>
                <div class="row">
                    <div class="offset-sm-2 col-sm-8 offset-sm-2" id="latest_jobs">
                        <section class="header_right text-center">
                            <h1>Latest Jobs</h1>
                        </section>
                        
                        <table class="table table-striped table-dark table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Company Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while($row_jobs = mysqli_fetch_array($result_jobs))
                                {
                                ?>
                                <tr>
                                    <td><?php echo $row_jobs['title'];  ?></td>
                                    <td><?php echo $row_jobs['description'];  ?></td>
                                    <td><?php echo $row_jobs['companyname'];  ?></td>
                                    <td>
                                        <form action="jobdetails.php" method="post">
                                            <input type="hidden" name="jobid" value="<?php echo $row_jobs['id'] ?>">
                                            <input type="submit" value="View" name="jobview" class="btn btn-success">
                                        </form>
                                    </td>
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
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>