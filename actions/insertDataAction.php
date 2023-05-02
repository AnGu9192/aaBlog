<?php
/* ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);  */
include "../config/connection.php";


if(isset($_POST['submit'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);

$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$sql = "INSERT INTO users (firstname, lastname, email,password,birthday,gender)
VALUES ('$firstname','$lastname', '$email','$password', '$birthday','$gender')";

if (mysqli_query($connection, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);

}