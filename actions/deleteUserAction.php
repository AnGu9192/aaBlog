<?php

include "../layouts/header.php"; 
include "../config/functions.php";


global $connection;

$userId = $_SESSION["USER_ID"];
if (!$userId) {
    header("location:../pages/signIn.php");
    die;
}



 $sql = delete('users', $userId );


 header("Location: ../pages/signIn.php");die; 