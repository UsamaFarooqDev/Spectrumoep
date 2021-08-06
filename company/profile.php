<?php
@include('../php/connection.php');
session_start();
if(isset($_SESSION['companyemail'])){
$email = $_SESSION['companyemail'];
}
$sql = "select * from company_db where email = '$email'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
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
                <div class="row text-center">
                    <div class="offset-sm-3 col-sm-1 header_profile ">
                        <h3>Your Profile</h3>
                    </div>
                    <div class="col-sm-5  right_side" id="profileform">
                        <img src="../images/company/<?php echo $row['pic']; ?>" class="img-fluid rounded-circle" style="background-color: #c3c3c3;" width="200" alt="">
                        <h4>
                            <font style="font-size: 18px;">Owner Name:</font><?php echo $row['fname']; ?></h4>
                        <h4>
                            <h4>
                                <font style="font-size: 18px;">Company Name:</font><?php echo $row['companyname']; ?></h4>
                            <h4>
                                <font style="font-size: 18px;">Phone Number:</font><?php echo $row['contact']; ?></h4>
                            <h4>
                                <font style="font-size: 18px;">Email:</font><?php echo $row['email']; ?></h4>
                            <h4>
                                <font style="font-size: 18px;">Niche:</font><?php echo $row['niche']; ?></h4>
                            <button class="btn btn-info" onclick="show_update_form()">Edit</button>
                    </div>
                    <div class="col-sm-5 right_side" id="updateform">
                        <form action="../php/update.php" method="post" enctype="multipart/form-data">
                            <img src="../images/placeholder.jpg" class="rounded-circle" id="displaypic" onClick="triggerClick()" width="300" height="300" alt=""> <br>
                            <label for="pic">Profile Pic</label> <br>
                            <input type="file" name="pic" id="changepic" class="changepic" onChange="displayImage(this)" style="display: none;">
                            <br>
                            <label for="">Name:</label>
                            <input type="text" name="uname" class="form-control" value="<?php echo $row['fname']; ?>" id="">
                            <label for="">Company Name:</label>
                            <input type="text" name="companyname" value="<?php echo $row['companyname']; ?>" id="" class="form-control">
                            <label for="">Contact:</label>
                            <input type="text" name="contact" id="email" value="<?php echo $row['contact']; ?>" class="form-control">
                            <label for="">Email:</label>
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" id="" class="form-control">
                            <label for="">Niche:</label>
                            <input type="text" name="niche" value="<?php echo $row['niche']; ?>" id="" class="form-control">
                            <input type="hidden" name="uid" value="<?php echo $row['ID']; ?>">
                            <br>
                            <input type="submit" name="companyupdate" value="Update" class="btn btn-success">
                        </form>

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