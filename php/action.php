<?php
@include('connection.php');

if(isset($_POST['companydelete'])){
    $id = $_POST['cid'];
    $sql = "delete from company_db where ID = '$id'";
    mysqli_query($con,$sql);
    header("refresh:0.1 url=../admin/home.php");
}
if(isset($_POST['clientdelete'])){
    $id = $_POST['clid'];
    $sql = "delete from client_db where ID = '$id'";
    if(mysqli_query($con,$sql)){
   header("refresh:0.1 url=../admin/home.php");
    }
    else{
        error_log($con);
    }

    
}
if(isset($_POST['admindelete'])){
    $id = $_POST['adminid'];
    $sql = "delete from admin_db where ID = '$id'";
    if(mysqli_query($con,$sql)){
   header("refresh:0.1 url=../admin/home.php");
    }
    else{
        error_log($con);
    }

    
}

?>