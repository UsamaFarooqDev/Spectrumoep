<?php
@include('connection.php');
if(isset($_POST['userupdate'])){
    $name = $_POST['uname'];
    $email = $_POST['email'];
    $degree = $_POST['degree'];
    $institue = $_POST['institute'];
    $contact = $_POST['contact'];
    $id = $_POST['uid'];
    $pic = $_FILES['pic']['name'];
    $target = "../images/clients/".basename($pic); 
    if(empty($pic)){
        $sql = "update client_db
        set fname = '$name' , email = '$email' , degree = '$degree' , institute = '$institue' , contact = '$contact'
        where ID = '$id'";
        if (mysqli_query($con,$sql) ) {
            session_start();
            $_SESSION['clientemail'] = $email;
            echo "<script type='text/javascript'>alert('Updated Succesfully');</script>";
           header("refresh:0.1 url=../user/profile.php");
            }
            else{
            echo "<script type='text/javascript'>alert('Error Try Again');</script>";
            
            
            }
    }
    else{
        $sql = "update client_db
        set fname = '$name' , email = '$email' , degree = '$degree' , institute = '$institue' , contact = '$contact' , pic = '$pic'
        where ID = '$id'";
        if (move_uploaded_file($_FILES['pic']['tmp_name'], $target) &&  mysqli_query($con,$sql) ) {
            session_start();
            $_SESSION['clientemail'] = $email;
            echo "<script type='text/javascript'>alert('Updated Succesfully');</script>";
            
           header("refresh:0.1 url=../user/profile.php");
            }
            else{
            echo "<script type='text/javascript'>alert('Error Try Again');</script>";
            
            
            }

    }
}

if(isset($_POST['companyupdate'])){
    $name = $_POST['uname'];
    $email = $_POST['email'];
    $company = $_POST['companyname'];
    $niche = $_POST['niche'];
    $contact = $_POST['contact'];
    $id = $_POST['uid'];
    $pic = $_FILES['pic']['name'];
    $target = "../images/company/".basename($pic); 
    if(empty($pic)){
        $sql = "update company_db
        set fname = '$name' , email = '$email' , companyname = '$company' , niche = '$niche' , contact = '$contact'
        where ID = '$id'";
        if (mysqli_query($con,$sql) ) {
            session_start();
            $_SESSION['companyemail'] = $email;
            echo "<script type='text/javascript'>alert('Updated Succesfully');</script>";
           header("refresh:0.1 url=../company/profile.php");
            }
            else{
            echo "<script type='text/javascript'>alert('Error Try Again');</script>";
            
            
            }
    }
    else{
        $sql = "update company_db
        set fname = '$name' , email = '$email' , companyname = '$company' , niche = '$niche' , contact = '$contact' , pic = '$pic'
        where ID = '$id'";
        if (move_uploaded_file($_FILES['pic']['tmp_name'], $target) &&  mysqli_query($con,$sql) ) {
            session_start();
            $_SESSION['companyemail'] = $email;
            echo "<script type='text/javascript'>alert('Updated Succesfully');</script>";
            
           header("refresh:0.1 url=../company/profile.php");
            }
            else{
            echo "<script type='text/javascript'>alert('Error Try Again');</script>";
            
            
            }

    }
}
?>