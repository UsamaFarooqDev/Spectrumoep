<?php
@include('connection.php');
if(isset($_POST['client_register'])){
    $id = rand(100,10000);
     $fname = $_POST['fname'];
     $pname = $_POST['pname'];
     $degree = $_POST['degree'];
     $institute = $_POST['institute'];
     $cnic = $_POST['cnic'];
     $city = $_POST['city'];
     $state = $_POST['state'];
     $country = $_POST['country'];
     $address = $_POST['address'];
     $contact = $_POST['contact'];
     $email = $_POST['email'];
     $pass = $_POST['pass'];
     $pic = $_FILES['pic']['name'];
     $target = "../images/clients/".basename($pic); 
     $sql = "Insert into client_db 
     VALUES('$id','$fname','$pname','$degree','$institute','$cnic','$city','$state','$country','$address','$contact','$email','$pass','$pic')";
     if (move_uploaded_file($_FILES['pic']['tmp_name'], $target) &&  mysqli_query($con,$sql) ) {
        echo "<script type='text/javascript'>alert('Registered Succesfully');</script>";
        header("refresh:0.1 url=../user/index.html");
        }
        else{
        echo "<script type='text/javascript'>alert('Error Try Again');</script>";
        
        }

}
if(isset($_POST['company_register'])){
    $id = rand(100,10000);
     $fname = $_POST['fname'];
     $companyname = $_POST['companyname'];
     $niche = $_POST['niche'];
     $regno = $_POST['regno'];
     $ownerid = $_POST['ownerid'];
     $city = $_POST['city'];
     $state = $_POST['state'];
     $country = $_POST['country'];
     $address = $_POST['address'];
     $contact = $_POST['contact'];
     $email = $_POST['email'];
     $pass = $_POST['pass'];
     $pic = $_FILES['pic']['name'];
     $target = "../images/company/".basename($pic); 
     $sql = "Insert into company_db 
     VALUES('$id','$fname','$companyname','$niche','$regno','$ownerid','$city','$state','$country','$address','$contact','$email','$pass','$pic')";
     if (move_uploaded_file($_FILES['pic']['tmp_name'], $target) &&  mysqli_query($con,$sql) ) {
        echo "<script type='text/javascript'>alert('Registered Succesfully');</script>";
       header("refresh:0.1 url=../company/index.html");
        }
        else{
        echo "<script type='text/javascript'>alert('Error Try Again');</script>";
        
        
        }

}

if(isset($_POST['admin'])){
    $id = rand(10,100000);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "insert into admin_db
    Values('$id','$name','$email','$pass')";
    if (mysqli_query($con,$sql) ) {
        echo "<script type='text/javascript'>alert('Registered Succesfully');</script>";
       header("refresh:0.1 url=../admin/home.php");
        }
        else{
        echo "<script type='text/javascript'>alert('Error Try Again');</script>";
        
        
        }
}
?>