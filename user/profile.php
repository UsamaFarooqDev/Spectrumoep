<?php
@include('../php/connection.php');

session_start();
if (isset($_SESSION['clientemail'])) {
    $email = $_SESSION['clientemail'];
}
$sql_user = "select * from client_db where email = '$email'";
$result_user = mysqli_query($con, $sql_user);
$row_user = mysqli_fetch_array($result_user);
$name = $row_user['fname'];

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/user.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="../js/user.js"></script>
    <title>Spectrum Staffing Solutions - User Home</title>
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
                <div class="row text-center">
                    <div class="col-sm-1 header_profile ">
                        <h3>Your Profile</h3>
                    </div>
                    <div class="offset-sm-3 col-sm-5 offset-sm-3 right_side" id="profileform">
                        <img src="../images/clients/<?php echo $row_user['pic']; ?>" class="img-fluid rounded-circle" style="background-color: #c3c3c3;" width="200" alt=""> <br>
                         <br> <br>
                        <h4>
                            <font style="font-size: 18px;color:white;margin-right:15px;">Name:</font><?php echo $row_user['fname']; ?>
                        </h4>
                        <h4>
                            <font style="font-size: 18px;color:white;margin-right:15px;">Phone Number:</font><?php echo $row_user['contact']; ?>
                        </h4>
                        <h4>
                            <font style="font-size: 18px;color:white;margin-right:15px;">Email:</font><?php echo $row_user['email']; ?>
                        </h4>
                        <h4>
                            <font style="font-size: 18px;color:white;margin-right:15px;">Degree:</font><?php echo $row_user['degree']; ?>
                        </h4>
                        <h4>
                            <font style="font-size: 18px;color:white;margin-right:15px;">Institue:</font><?php echo $row_user['institute']; ?>
                        </h4>
                        <a href="javascript:void(0)" onclick="show_update_form()" class="btn btn-warning">Edit</a>
                    </div>
                    <div class="offset-sm-3 col-sm-5 offset-sm-3 right_side" id="updateform">
                        <form action="../php/update.php" method="post" enctype="multipart/form-data">
                            <img src="../images/placeholder.jpg" class="rounded-circle" id="displaypic" onClick="triggerClick()" width="300" height="300" alt=""> <br>
                            <label for="pic">Profile Pic</label> <br>
                            <input type="file" name="pic" id="changepic" class="changepic" onChange="displayImage(this)" style="display: none;">
                            <br>
                            <label for="">Name:</label>
                            <input type="text" name="uname" class="form-control" value="<?php echo $row_user['fname']; ?>" id="">
                            <label for="">Phone Number:</label>
                            <input type="text" name="contact" value="<?php echo $row_user['contact']; ?>" id="" class="form-control">
                            <label for="">Email:</label>
                            <input type="text" name="email" id="email" value="<?php echo $row_user['email']; ?>" class="form-control">
                            <label for="">Degree:</label>
                            <input type="text" name="degree" value="<?php echo $row_user['degree']; ?>" id="" class="form-control">
                            <label for="">Institute:</label>
                            <input type="text" name="institute" value="<?php echo $row_user['institute']; ?>" id="" class="form-control">
                            <input type="hidden" name="uid" value="<?php echo $row_user['ID']; ?>">
                            <br>
                            <input type="submit" name="userupdate" value="Update" class="btn btn-success">
                        </form>

                    </div>

                </div>
                <br>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>