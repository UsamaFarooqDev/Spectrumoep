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
                    <div class="offset-sm-2 col-sm-1 header_profile ">
                        <h3>Post Job</h3>
                    </div>
                    <div class="col-sm-9  right_side">
                    <?php
                            
                            if(isset($_SESSION['success'])){
                                echo $_SESSION['success'];
                               
                            }
                                                        ?>
                        <form action="../php/actionjob.php" method="post" enctype="multipart/form-data">
                        
                            <div class="row">
                                <div class="col-sm-3" id="form-left">
                                    <label for=""><b>Choose Category</b></label>
                                    <input class="form-control" list="list" name="category" placeholder="Choose Category" required>
                                    <datalist id="list">
                                        <option value="IT Department">IT Department</option>
                                        <option value="Health Department">Health Department</option>
                                        <option value="Education Department">Education Department</option>
                                        <option value="Oil & Gas Department">Oil & Gas Department</option>
                                        <option value="Banking Department">Banking Department</option>
                                        <option value="Workers & Guards">Workers & Guards</option>
                                    </datalist>
                                    <br>
                                    <a href="javascript:void(0)" onclick="show_form()" class="btn btn-danger">Continue</a>
                                </div>
                                <div class="col-sm-9" id="form-right">
                                <h2><?php echo $row['companyname']; ?></h2>
                                <input type="hidden" class="form-control" name="cname" value="<?php echo $row['companyname']; ?>">
                                    <label for=""><b>Title:</b></label>
                                    <input type="text" name="title" placeholder="Title" id="" class="form-control" required>
                                    <label for=""><b>Description:</b></label>
                                    <textarea name="description" id="" cols="30" rows="5" class="form-control" required></textarea>
                                    <label for=""><b>Minimum Experience:</b></label>
                                    <input type="text" name="experience" placeholder="Experience" id="" class="form-control" required>
                                    <label for=""><b>Minimum Contract Peroid:</b></label>
                                    <input type="text" name="contract" placeholder="Contract Peroid" id="" class="form-control" required>
                                    <label for=""><b>Salary:</b></label>
                                    <input type="text" name="salary" id="" class="form-control">
                                  
                                    <br>
                                    <input type="submit" name="jobpost" value="Post" class="btn btn-danger">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- partial -->
    <script>
        setTimeout(function(){
    document.getElementById("msg").style.display="none";
}, 3000);

    </script>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
    <script src="../js/company.js"></script>

</body>

</html>