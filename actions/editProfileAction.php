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

     $sql = update('users', $data, $userId);
/*     $sql = "UPDATE users SET  firstname = '$firstname',lastname = '$lastname', email='$email',birthday = '$birthday',  gender = '$gender' WHERE  id=$userId";

    if (mysqli_query($connection, $sql)) {
        header("location:../pages/profile.php");
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    } */

/*     mysqli_close($connection);
 */
}
header("Location: ../pages/profile.php");die; 
