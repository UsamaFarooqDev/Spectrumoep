<?php
@include('../php/connection.php');

session_start();
if(isset($_SESSION['clientemail'])){
$email = $_SESSION['clientemail'];
}
$sql_user = "select * from client_db where email = '$email'";
$result_user = mysqli_query($con,$sql_user);
$row_user = mysqli_fetch_array($result_user);
$name = $row_user['fname'];

$fetch_jobs = "select * from jobsapplied_db where username = '$name'";
$result_jobs = mysqli_query($con,$fetch_jobs);

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
 
</head>

<body>
    <div class="container-fluid">
        <div class="row header  text-center">

            <div class="col-sm-10 right_content">
                <h1>Welcome To Spectrum Staffing Solutions</h1>
            </div>
            <div class="col-sm-2">
                <a href="javascript:void(0)" class="btn btn-success" id="nav_bt" onclick="show_sidebar()">Open Menu</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 sidebar" id="sidebar">

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
                        <h3>All Proposals</h3>
                    </div>
                </div>
                <br>
                <div class="row ">
                <table class="table table-striped table-dark table-hover">
                       <thead>
                           <tr>
                               <th>Title</th>
                               <th>Description</th>
                               <th>Company Name</th>
                               <th>Status</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
                           while($row_job=mysqli_fetch_array($result_jobs)){
                               ?>
                           <tr>
                               <td><?php echo $row_job['title'];?></td>
                               <td><?php echo $row_job['description'];?></td>
                               <td><?php echo $row_job['companyname'];?></td>
                               <td><button class="disabled btn btn-success">Delivered</button>
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