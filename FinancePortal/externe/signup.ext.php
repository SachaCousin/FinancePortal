<?php
if(isset($_POST['signup-submit'])){
    require 'dbh.ext.php';
    $name=$_POST['prenom'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    var_dump($_POST['username']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-z0-9]*$/",$username)){
        header("Location:../Signup.php?error=invalidusername&email");
        exit();
    }else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location:../Signup.php?error=invalidemail");
        exit();

    }else if (!preg_match("/^[a-zA-z0-9]*$/",$username)){
        header("Location:../Signup.php?error=invalidusername");
        exit();
    }else if($password!==$password2){
        header(header("Location:../Signup.php?error=Pwdnotmatch"));
        exit();
    }else{
        $sql= "SELECT username FROM usertable WHERE username='$username';";
        $res=mysqli_query($con,$sql);
        if(!$res){
        header("Location:../Signup.php?empty");
        exit();
        }else{
            $resultcheck=mysqli_num_rows($res);
      
            if($resultcheck>0){
            header("Location:../Signup.php?existinguser");
            exit();
            }else{
                $hashedPwd= password_hash($password,PASSWORD_DEFAULT);
                $sql="INSERT INTO userTable(name,username,email,pwd) VALUES ('$name','$username','$email','$hashedPwd');";
                $res=mysqli_query($con,$sql);
                
                if(!$res){
                    header("Location:../Signup.php?sqlerror");
                    exit();
                    }else{
                        header("Location:../Signup.php?success");
                    exit();
                    };
            
            
            };


        };
    };

    mysqli_close($con);

}else{
    header("Location:../Signup.php?everythingOK");
    exit();
};






