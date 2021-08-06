<?php
$servername="localhost:3306";
$user="root";
$password="";
$dbname="spectrum";

$con = mysqli_connect($servername,$user,$password,$dbname);
if(!$con){
    echo 'Connection error';
}
?>