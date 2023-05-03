<?php
session_start();
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
include "../config/functions.php";

if (isset($_POST["firstname"]) && !empty($_POST["firstname"])) {
    $firstname = $_POST["firstname"];
    unset($_SESSION["errors"]["firstname"]);
    $_SESSION["old"]["firstname"] = $firstname;
} else {
    $_SESSION["errors"]["firstname"] = 'Firstname is required and can`t be empty';
    header("Location: ../pages/signUp.php");
    die;
}

if (isset($_POST["lastname"]) && !empty($_POST["lastname"])) {
    $lastname = $_POST["lastname"];
    unset($_SESSION["errors"]["lastname"]);
    $_SESSION["old"]["lastname"] = $lastname;
} else {
    $_SESSION["errors"]["lastname"] = 'Lastname is required and can`t be empty';
    header("Location: ../pages/signUp.php");
    die;
}


if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = $_POST["email"];
    unset($_SESSION["errors"]["email"]);
    $_SESSION["old"]["email"] = $email;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errors"]["email"] = "Invalid email format";
    }
} else {
    $_SESSION["errors"]["email"] = 'Email is required and can`t be empty';
    header("Location: ../pages/signUp.php");
    die;
}



if (isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = $_POST["password"];
    unset($_SESSION["errors"]["password"]);
    $_SESSION["old"]["password"] = $password;

} else {
    $_SESSION["errors"]["password"] = 'Password is required and can`t be empty';
    header("Location: ../pages/signUp.php");
    die;
}


// Validate password strength
/* $uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
    $_SESSION["errors"]["password"] = 'Password should be at least 6 characters in length and should include at least one upper case letter, one number, and one special character.';
} */

if (isset($_POST["repeat_password"]) && !empty($_POST["repeat_password"])) {
    $repeat_password = $_POST["repeat_password"];
    unset($_SESSION["errors"]["repeat_password"]);
    $_SESSION["old"]["repeat_password"] = $repeat_password;
} else {
    $_SESSION["errors"]["repeat_password"] = 'Repeat password is required and can`t be empty';
    header("Location: ../pages/signUp.php");
    die;
}
if (isset($_POST["birthday"]) && !empty($_POST["birthday"])) {
    $birthday = $_POST["birthday"];
    unset($_SESSION["errors"]["birthday"]);
    $_SESSION["old"]["birthday"] = $birthday;
} else {
    $_SESSION["errors"]["birthday"] = 'Birthday is required and can`t be empty';
    header("Location: ../pages/signUp.php");
    die;
}
if (isset($_POST["gender"]) && !empty($_POST["gender"])) {
    $gender = $_POST["gender"];
    unset($_SESSION["gender"]["gender"]);
    $_SESSION["old"]["gender"] = $gender;

} else {
    $_SESSION["errors"]["gender"] = 'Gender is required and can`t be empty';
    header("Location: ../pages/signUp.php");
    die;
}
if (!$_SESSION["errors"]) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $data = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'password' => $password,
        'email' => $email,
        'birthday' => $birthday,
        'gender' => $gender,
    ];

    $userRegistered = insert('users',$data);

    if ($userRegistered) {
        header("Location: ../pages/signIn.php");
        die;
    }

}

header("Location: ../pages/signUp.php");
die;