<?php
session_start();
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
include "../config/functions.php";


if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = $_POST["email"];

}

    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = $_POST["password"];
/*         unset($_SESSION["errors"]["password"]);
        $_SESSION["old"]["password"] = $password; */  //harc
    }
    else{
        $_SESSION["errors"]["password"] = "Your Login Name or Password is invalid";
        header("Location: ../pages/signIn.php");die;
    }

     if(!isset($_SESSION["errors"])){

        $user = select('users',['email'=>$email],'id,password');
        if ($user) {
            if(password_verify($password, $user["password"])){
                $_SESSION['USER_ID'] = $user['id'];
                header("location:../pages/profile.php");die;
            }

        }else{
            $_SESSION["errors"]["user"] = "Your Login Name or Password is invalid";
            header("location:../pages/signIn.php");die;
        }
    }
    
    header("Location: ../actions/signInAction.php");die; 
 