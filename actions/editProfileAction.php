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

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    $data = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'birthday' => $birthday,
        'gender' => $gender,
      ];

   //$sql = "UPDATE users SET  firstname = '$firstname',lastname = '$lastname', email='$email',birthday = '$birthday',  gender = '$gender' WHERE  id=$userId";


    $usersUpdated = update('users',$data,$userId );
    if($usersUpdated){
     header("Location: ../pages/profile.php");die;
    }
    else {
       echo "Sorry, there was an error uptade your file.";

   }

}
header("Location: ../pages/profile.php");die; 
