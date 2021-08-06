<?php
@include('connection.php');
if(isset($_POST['client_login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "Select * from client_db where email = '$email'";
   $result = mysqli_query($con , $sql);
   $row = mysqli_fetch_array($result);
   if($row['email'] == $email && $row['pass'] == $pass){
    session_start();
    $_SESSION['clientemail'] = $row['email'];
    echo "<script type='text/javascript'>alert('Login Succesfully');</script>";
    header("refresh:0.1 url=../user/home.php");
}
else{
    echo "<script type='text/javascript'>alert('Email & Password Incorrect');</script>";
    header("refresh:0.1 url=../user/index.html");
}
    
}
if(isset($_POST['company_login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "Select * from company_db where email = '$email'";
$result = mysqli_query($con , $sql);
$row = mysqli_fetch_array($result);
if($row['email'] == $email && $row['pass'] == $pass){
       session_start();
       $_SESSION['companyemail'] = $row['email'];

    echo "<script type='text/javascript'>alert('Login Succesfully');</script>";
    header("refresh:0.1 url=../company/home.php");
}
   else{
    echo "<script type='text/javascript'>alert('Email & Password Incorrect');</script>";
    header("refresh:0.1 url=../company/index.html");
   }
    
}
if(isset($_POST['admin'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "Select * from admin_db where email = '$email'";
   $result = mysqli_query($con , $sql);
   $row = mysqli_fetch_array($result);
   if($row['email'] == $email && $row['pass'] == $pass){
       session_start();
       $_SESSION['adminname'] = $row['name']; 
    echo "<script type='text/javascript'>alert('Login Succesfully');</script>";
    header("refresh:0.1 url=../admin/home.php");
   }
   else{
    echo "<script type='text/javascript'>alert('Email & Password Incorrect');</script>";
    header("refresh:0.1 url=../admin/index.html");
   }
    
}

?>