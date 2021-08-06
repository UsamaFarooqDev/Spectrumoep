<?php
@include('connection.php');

$id = rand(100,10000);
$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$experience = $_POST['experience'];
$contract = $_POST['contract'];
$salary = $_POST['salary'];
$cname = $_POST['cname'];
$sql = "Insert into jobs_db
VALUES('$id','$title','$category','$description','$experience','$contract','$salary','$cname')";
 if(mysqli_query($con,$sql)){
    session_start();
    $_SESSION['success'] = '<div class="alert alert-success" id="msg">
    <h5> Job Posted Succesfully </h5>
    </div>';
    header("refresh:0.1 url=../company/postjob.php");
}
else{
    echo "<script type='text/javascript'>alert('Try Again');</script>";
//    echo mysqli_error($con);
  //  header("refresh:0.1 url=../company/postjob.php");
 // echo mysqli_error($con);
}

?>