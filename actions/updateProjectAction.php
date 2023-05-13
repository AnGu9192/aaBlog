<?php
session_start();
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
include "../config/functions.php";

$userId = $_SESSION["USER_ID"];
if (!$userId) {
    header("location:../pages/signIn.php");
    die;
}


if (isset($_POST['submit'])) {


    $data = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,

      ];

    //$sql = "UPDATE users SET  firstname = '$firstname',lastname = '$lastname', email='$email',birthday = '$birthday',  gender = '$gender' WHERE  id=$userId";


    $projectUpdated = update('projects',$data,$id);


}
header("Location: ../pages/projects.php");die;
