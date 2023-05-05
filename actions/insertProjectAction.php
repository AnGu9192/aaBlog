<?php
/* ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);  */
include "../config/functions.php";



if(isset($_POST['submit'])){

$projectimg = $_POST['projectimg'];
$projectcount = $_POST['projectcount'];
$projectname = $_POST['projectname'];
$description = $_POST['description'];

$data = [
  'projectimg' => $projectimg,
  'projectcount' => $projectcount,
  'projectname' => $projectname,
  'description' => $description,

];

insert('projects',$data);


}

header("Location: ../pages/profile.php");die; 
