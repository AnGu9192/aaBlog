

<?php
session_start();
include "../layouts/header.php";
include "../config/functions.php";
$allProjects = select('projects',['status'=>'active'],'*');

$projectId = $_GET['id'];
echo $projectId;

?>

<div class="container">
    <div class="contactForm">
        <form action="<?php echo BASE_URL; ?>actions/updateProjectAction.php" method="post"
            enctype="multipart/form-data" autocomplate="off">
            <div class='registration_page'>
                <label>
                    <h2 class="signup">Update Project</h2>
            </div>

            <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">

                <div class="inputBox">
                <span style="color:white">Project Image</span>

               
                    <div id="display-image"></div>
           
             </div>

                <div class="inputBox">
                    <input name="title" id="title" >
                    <span>Project Title</span>
                    <p class="error">
                        <?= isset($_SESSION["errors"]["title"]) ? $_SESSION["errors"]["title"] : '' ?>
                    </p>
                </div>
                <div class="inputBox">
                    <input name="description" id="description">
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

