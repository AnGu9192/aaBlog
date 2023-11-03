<?php
session_start();
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
include "../config/functions.php";


$target_dir = "../uploads/";
$filename = uniqid() . '_' . basename($_FILES["image"]["name"]);
$target_file = $target_dir . $filename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$allowedExtensions = ["jpg", "png", "jpeg", "gif", "svg", "webp"];
if (!in_array($imageFileType, $allowedExtensions)) {
    $_SESSION["errors"]["upload"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}



if (isset($_POST['submit'])) {
    $id =  $_POST['id'];

    $title = $_POST['title'];
    $description = $_POST['description'];

    $data = [
        'id'=> $id,
        'title' => $title,
        'description' => $description,
  ];

    if ($uploadOk ==1 ) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $data = [
                'id'=> $id,
                'image' => $filename,
                'title' => $title,
                'description' => $description,
            ];

        }
    }



    $projectUpdated = update('projects',$data,$id);

}
header("Location: ../pages/myprojects.php");die;
