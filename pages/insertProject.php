<?php
session_start();
include "../layouts/header.php"; ?>
<div class="container">
    <div class="contactForm">
        <form action="<?php echo BASE_URL; ?>actions/insertProjectAction.php" method="post" autocomplate="off">
            <div class='registration_page'>
                <h2 class="signup">Insert Project</h2>
            </div>
            <div class="inputBox">
                <input type="file" name="projectimg" id="projectimg" enctype='multipart/form-data'
                    value="<?= isset($_SESSION["old"]["projectimg"]) ? $_SESSION["old"]["projectimg"] : '' ?>">
                <span>Project Img</span>
                <p class="error">
                    <?= isset($_SESSION["errors"]["projectimg"]) ? $_SESSION["errors"]["projectimg"] : '' ?>
                </p>
            </div>
            <div class="inputBox">
                <input type="text" name="projectcount" id="projectcount"
                    value="<?= isset($_SESSION["old"]["projectcount"]) ? $_SESSION["old"]["projectcount"] : '' ?>">
                <span>Project Count</span>
                <p class="error">
                    <?= isset($_SESSION["errors"]["projectcount"]) ? $_SESSION["errors"]["projectcount"] : '' ?>
                </p>

            </div>
        
            <div class="inputBox">
                <input type="text" name="projectname" id="projectname" class="password-container" value="<?= isset($_SESSION["old"]["projectname"])?$_SESSION["old"]["projectname"]:'' ?>">
                <span>Project Name</span>
                <p class="error"><?= isset($_SESSION["errors"]["password"])?$_SESSION["errors"]["password"]:'' ?></p>

            </div>

     
       <div class="inputBox">
                    <input id="date"  name="description" id="description" value="<?= isset($_SESSION["old"]["description"]) ? $_SESSION["old"]["description"] : '' ?>">
                    <span>Description</span>
                    <p class="error"><?= isset($_SESSION["errors"]["description"]) ? $_SESSION["errors"]["description"] : '' ?></p>
                
                </div>
        
            <div class="inputBox">
                <input type="submit" value="Insert" name="submit">
            </div>

        </form>

    </div>

</div>

<?php
session_destroy();
include "../layouts/footer.php";
?>