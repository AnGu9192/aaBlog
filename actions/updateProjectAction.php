<?php
session_start();
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
include "../config/functions.php";


//$projectId = $_GET['id'];


if (isset($_POST['submit'])) {
    $id =  $_POST['id'];
    $image = $_POST['image'];
    $title = $_POST['title'];
    $description = $_POST['description'];


    $data = [
        'id'=> $id,
        'image' => $image,
        'title' => $title,
        'description' => $description,

      ];


    $projectUpdated = update('projects',$data,$id);

}
header("Location: ../pages/projects.php");die;
