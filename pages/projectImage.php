<?php
include "../layouts/header.php";
include "../config/functions.php";


$project = select('projects',['status'=>'active','user_id' => $userId]);


$projectId = $_GET['id'];

var_dump($project);


?>

         <div class="project-image-display">

      <img src="<?php echo BASE_URL; ?>uploads/<?php echo $project['image'];?>" />

        </div>

