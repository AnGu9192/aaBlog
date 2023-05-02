<?php
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
include "../config/connection.php";

$userId = $_SESSION["USER_ID"];
if (!$userId) {
    header("location:../pages/update.php");
    die;
}


if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];


    $sql = "UPDATE users SET  firstname = '$firstname',lastname = '$lastname', email='$email',birthday = '$birthday',  gender = '$gender' WHERE  id=$userId";

    if (mysqli_query($connection, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    mysqli_close($connection);

}