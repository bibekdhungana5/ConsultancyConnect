<?php
$_servername="localhost";
$_username="root";
$_password="";  
$_dbname="consultancy";
$conn=mysqli_connect($_servername,$_username,$_password,$_dbname);
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
};


?>