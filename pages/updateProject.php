

<?php
session_start();
include "../layouts/header.php";
include "../config/functions.php";

$projectId = $_GET['id'];
$project = selectOne('projects',['id'=> $projectId]);
var_dump($project );

?>

<div class="container">
    <div class="contactForm">
        <form action="<?php echo BASE_URL; ?>actions/updateProjectAction.php" method="post"
            enctype="multipart/form-data" autocomplate="off">
                <div class="inputBox">
                    <h2 class="signup">Update Project</h2>
                       <label>
               <i class="fa fa-plus" style="font-size:22px; padding:15px;margin-top:35px;cursor:pointer"
                               onchange="getImage(event)"></i>
               <input type="file" name="image" id="image" class="hide" id="upload" onchange="getImage(event)">

             <div id="display-image"><img src="<?php echo BASE_URL; ?>uploads/<?php echo $project['image'];?>" name="image" id="image"/></div>
            <div id="uploadImageProect"></div>
              </label>
            </div>
                         <input name="id" id="id" type="hidden" value="<?= $project['id'] ?>">

                <div class="inputBox">
                    <input name="title" id="title" value="<?= $project['title'] ?>">
                    <span>Project Title</span>
                    <p class="error">
                        <?= isset($_SESSION["errors"]["title"]) ? $_SESSION["errors"]["title"] : '' ?>
                    </p>
                </div>
                <div class="inputBox">
                    <input name="title" id="title" value="<?= $project['description'] ?>">
                    <span>Description</span>
                    <p class="error">
                        <?= isset($_SESSION["errors"]["description"]) ? $_SESSION["errors"]["description"] : '' ?>
                    </p>

                </div>
                <div class="inputBox">
                    <input type="submit" value="Update" name="submit">

                </div>

            </form>
            <p class="error">
                        <?= isset($_SESSION["errors"]["submit"]) ? $_SESSION["errors"]["submit"] : '' ?>
           </p>
    </div>

</div>

<?php
include "../layouts/footer.php";
?>

