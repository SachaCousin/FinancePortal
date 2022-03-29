<?php
if(isset($_POST['login-submit'])){
    require 'dbh.ext.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    $sql="SELECT * FROM usertable WHERE username='$username'OR email='$username';";
    $res=mysqli_query($con,$sql);
    if(!$res){
        header("Location:../login.php?error=sqlerror");
        exit();
    }else{
        if($row=mysqli_fetch_assoc($res)){
            $pwdCheck = password_verify($password,$row["pwd"]);
            if($pwdCheck==false){
                header("Location:../login.php?passwordfaux");
                exit();   
            }else if($pwdCheck==true){
                session_start();
                $_SESSION["userId"]=$row["id"];
                $_SESSION["username"]=$row["username"];
                header("Location:../Dashboard.php?login=SUCCES");
                exit(); 

                    };  
            
        }else{
            header("Location:../login.php?existpas");
            exit();   
        };
    };
    



 mysqli_close($con);

}else{
    header('Location:../login.php');
    exit();
};