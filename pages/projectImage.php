<?php
include "../layouts/header.php";
include "../config/functions.php";

$allProjects = select('projects',['status'=>'active'],'*');



$projectId = $_GET['id'];

echo $projectId;


?>

         <div class="project-image-display">

      <img src="<?php echo BASE_URL; ?>images/1-semur.jpg" name="image" id="image"
          style=" display: block;
          margin-left: auto;
          margin-right: auto;
          margin-top:20px;
          width:60%";
       />

        </div>

