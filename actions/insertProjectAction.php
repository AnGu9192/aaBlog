<?php
/* ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);  */
session_start();
include "../config/functions.php";

$userId = $_SESSION["USER_ID"];


if(isset($_POST['submit'])){

$image = $_POST['image'];
$title = $_POST['title'];
$description = $_POST['description'];

$target_dir = "../uploads/";
$image = uniqid().'_'.basename($_FILES["image"]["name"]);
$target_file = $target_dir . $image;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$data = [
  'image' => $image,
  'title' => $title,
  'description' => $description,
  'user_id' => $userId,
];


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
}
// Check file size
if ($_FILES["image"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
// Allow certain file formats
$allowedExtensions = ["jpg","png","jpeg","gif","svg","webp"];
if (!in_array($imageFileType,$allowedExtensions)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $projectInserted = insert('projects',$data);

    if($projectInserted){
      //Remove old image file
      header("Location: ../pages/myprojects.php");die; 
    }     
      
  } else {
      echo "Sorry, there was an error uploading your file.";

  }
 
}
}
