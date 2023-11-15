<?php

include "../layouts/header.php";
//include "../config/functions.php";


global $connection;

$projectId = $_GET['id'];
if (!$projectId) {
    header("location:../pages/myprojects.php");
    die;
}

$sql = delete('projects', $projectId);



header("Location: ../pages/myprojects.php");die; 