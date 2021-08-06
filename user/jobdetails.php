<?php
@include('../php/connection.php');

session_start();
if(isset($_SESSION['clientemail'])){
$email = $_SESSION['clientemail'];
}
$fetch_user = "select * from client_db where email = '$email'";
$result_user = mysqli_query($con,$fetch_user);
$row_user = mysqli_fetch_array($result_user);
$name = $row_user['fname'];
if(isset($_POST['jobview'])){
    $jobid = $_POST['jobid'];
}
$fetch_jobs = "select * from jobs_db where id = '$jobid'";
$result_jobs = mysqli_query($con,$fetch_jobs);
$row_job = mysqli_fetch_array($result_jobs);
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
                <div class="row">
                    <div class="offset-sm-2 col-sm-8 offset-sm-2">
                        <form action="../php/jobapply.php" method="post" id="jobdetails" enctype="multipart/form-data">
                            <h2><?php echo $row_job['title']; ?></h2>
                            <hr>
                            <h5><font><small>Company Name: </small></font><?php echo $row_job['companyname']; ?></h5>
                            <p><?php echo $row_job['description']; ?></p>
                            <hr>
                            <h5>Salary: <?php echo $row_job['salary']; ?></h5>
                            <hr>
                            <h5>Experience: <?php echo $row_job['experience']; ?> <font><small>Years</small></font></h5>
                            <hr>
                            <h5>Contract: <?php echo $row_job['contract']; ?> <font><small>Years</small></font></h5>
<br>
                            <input type="hidden" name="jobid" value="<?php echo $jobid; ?>">
                            <input type="hidden" name="username" value="<?php echo $name; ?>">
<label for="">Upload Resume:</label>
<input type="file" name="cv" id="">
<br> <br>
<input type="submit" value="Apply" class="btn btn-success" name="applyjob">
                        </form>

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