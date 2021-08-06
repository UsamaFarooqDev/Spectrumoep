<?php
@include('connection.php');
if(isset($_POST['applyjob'])){
    $jobid = $_POST['jobid'];
$user = $_POST['username'];
    $job_details = "select * from jobs_db where id = '$jobid'";
    $result_job = mysqli_query($con,$job_details);
    $row_job = mysqli_fetch_array($result_job);
    $title = $row_job['title'];
    $description = $row_job['description'];
    $company = $row_job['companyname'];
    $id = rand(100,10000);
    $resume = $_FILES['cv']['name'];
    $target = "../cv/".basename($resume); 
    $sql = "INSERT INTO jobsapplied_db
VALUES('$id','$title','$description','$user','$company','$resume')";

if(move_uploaded_file($_FILES['cv']['tmp_name'], $target) && mysqli_query($con,$sql)){
    echo "<script type='text/javascript'>alert('Applied Succesfully');</script>";
    header("refresh:0.1 url=../user/home.php");
}
else{
    echo "<script type='text/javascript'>alert('Try Again');</script>";
//    echo mysqli_error($con);
   header("refresh:0.1 url=../user/jobdetails.php");
  
}
}
   
   



?>