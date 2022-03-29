<?php
$servername = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "Finance";

$con=mysqli_connect($servername,$dbUser,$dbPassword,$dbName);

if(!$con){
    
    die("connexion failed".mysqli_connect_error);
    }else{
        $sql= "SELECT username FROM usertable";
    $res=mysqli_query($con,$sql);
    
};

