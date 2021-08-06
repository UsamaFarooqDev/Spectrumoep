<?php
@include('connection.php');

if(isset($_POST['hire'])){
    $id = rand(10,10000);
    $title = $_POST['jobtitle'];
    $description = $_POST['jobdescription'];
    $user = $_POST['username'];
    $company = $_POST['companyname'];

    $sql = "insert into hire_db 
    Values('$id','$title','$description','$user','$company')";
    if(mysqli_query($con,$sql)){
        echo "<script type='text/javascript'>alert('Hired Succesfully');</script>";
    header("refresh:0.1 url=../company/home.php");
    }
    else{
        header("refresh:0.1 url=../company/applications.php");
    }
}
if(isset($_POST['delete'])){
    $postid = $_POST['pid'];
    $sql = "Delete from jobsapplied_db where id = '$postid'";
 if(mysqli_query($con,$sql)){
        echo "<script type='text/javascript'>alert('Deleted Succesfully');</script>";
    header("refresh:0.1 url=../company/home.php");
    }
    else{
        header("refresh:0.1 url=../company/applications.php");
    }
}


?>