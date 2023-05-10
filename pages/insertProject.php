<?php
session_start();
include "../layouts/header.php"; ?>
<div class="container">
    <div class="contactForm">
        <form action="<?php echo BASE_URL; ?>actions/insertProjectAction.php" method="post"
            enctype="multipart/form-data" autocomplate="off">
            <div class='registration_page'>
                <label>
                    <h2 class="signup">Insert Project</h2>
            </div>
           
            <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">

                <div class="inputBox">
                <span style="color:white">Project Image</span>

                <label><i class="fa fa-plus" style="font-size:22px;
                                                    padding:15px;margin-top:35px;cursor:pointer"></i>
                <input type="file" name="image" id="image" style="display: none; visibolity: none;"/>
                <div id="projectImage"></div>
                    </label>
                </div>

                <div class="inputBox">
                    <input name="title" id="title">
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
                    <input type="submit" value="Insert" name="submit">
               
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