<?php
session_start();

ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
include "../config/connection.php";

$userId = $_SESSION["USER_ID"];
if (!$userId) {

    header("location:../pages/signIn.php");
    die;
}

$target_dir = "../uploads/";
$filename = uniqid() . '_' . basename($_FILES["avatar"]["name"]);
$target_file = $target_dir . $filename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["upload"]) && !empty($_POST["upload"])) {
    $upload = $_POST["upload"];
    unset($_SESSION["errors"]["upload"]);
    $_SESSION["old"]["upload"] = $upload;
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $_SESSION["errors"]["upload"] = "File is not an image.";
        $uploadOk = 0;
        header("Location: ../pages/profile.php");
        die;
    }
}

// Check file size
if ($_FILES["avatar"]["size"] > 5000000) {
    $_SESSION["errors"]["upload"] = "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowedExtensions = ["jpg", "png", "jpeg", "gif", "svg", "webp"];
if (!in_array($imageFileType, $allowedExtensions)) {
    $_SESSION["errors"]["upload"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {
    $_SESSION["errors"]["upload"] = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
        $sql = "UPDATE users SET avatar='$filename' WHERE id=$userId";
        $avatarUploaded = mysqli_query($connection, $sql);
        if ($avatarUploaded) {
            //Remove old image file
            header("Location: ../pages/profile.php");
            die;
        }
    }
}


//header("Location: ../pages/profile.php");die;