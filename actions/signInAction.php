<?php

ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
include "../config/connection.php";


if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = $_POST["email"];

}

    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = $_POST["password"];
        unset($_SESSION["errors"]["password"]);
        $_SESSION["old"]["password"] = $password;
    }
    else{
        $_SESSION["errors"]["password"] = "Your Login Name or Password is invalid";
        header("Location: ../pages/signIn.php");die;
    }

     if(!$_SESSION["errors"]){
        $query = "SELECT id,password FROM users WHERE  email='$email' LIMIT 1";
        $data = mysqli_query($connection, $query);
        $num = mysqli_num_rows($data);
        if ($num === 1) {
            $user = mysqli_fetch_assoc($data);
            if($user){
                if(password_verify($password, $user["password"])){
                    $_SESSION['USER_ID'] = $user['id'];
                    header("location:../pages/profile.php");die;
                }
            }
    
        } 
    }
    
    header("Location: ../actions/signInAction.php");die; 
 