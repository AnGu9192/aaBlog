<?php
session_start();
include "../layouts/header.php"; ?>
<div class="container">
    <div class="contactForm">
        <form action="<?php echo BASE_URL; ?>actions/insertDataAction.php" method="post" autocomplate="off">
            <div class='registration_page'>
                <h2 class="signup">Insert Data</h2>
            </div>

            <div class="inputBox">
                <input type="text" name="firstname" id="firstname"
                    value="<?= isset($_SESSION["old"]["firstname"]) ? $_SESSION["old"]["firstname"] : '' ?>">
                <span>First Name *</span>
                <p class="error">
                    <?= isset($_SESSION["errors"]["firstname"]) ? $_SESSION["errors"]["firstname"] : '' ?>
                </p>
            </div>
            <div class="inputBox">
                <input type="text" name="lastname" id="lastname"
                    value="<?= isset($_SESSION["old"]["lastname"]) ? $_SESSION["old"]["lastname"] : '' ?>">
                <span>Last Name *</span>
                <p class="error">
                    <?= isset($_SESSION["errors"]["lastname"]) ? $_SESSION["errors"]["lastname"] : '' ?>
                </p>

            </div>
            <div class="inputBox">
                <input type="text" name="email" id="email"
                    value="<?= isset($_SESSION["old"]["email"]) ? $_SESSION["old"]["email"] : '' ?>">
                <span>Email *</span>
                <p class="error">
                    <?= isset($_SESSION["errors"]["email"]) ? $_SESSION["errors"]["email"] : '' ?>
                </p>

            </div>
            <div class="inputBox">
                <input type="password" name="password" id="password" class="password-container" value="<?= isset($_SESSION["old"]["password"])?$_SESSION["old"]["password"]:'' ?>">
                <i class="fa fa-eye" id="eye"></i> 
                <span>Password*</span>
                <p class="error"><?= isset($_SESSION["errors"]["password"])?$_SESSION["errors"]["password"]:'' ?></p>

            </div>

     
       <div class="inputBox">
                    <input id="date" type="date" name="birthday" id="birthday" value="<?= isset($_SESSION["old"]["birthday"]) ? $_SESSION["old"]["birthday"] : '' ?>">
                    <span>Birthday*</span>
                    <p class="error"><?= isset($_SESSION["errors"]["birthday"]) ? $_SESSION["errors"]["birthday"] : '' ?></p>
                
                </div>
            <div class="radio__contant" id="gen" value="<?= isset($_SESSION["old"]["gender"]) ? $_SESSION["old"]["gender"] : '' ?>">
             <p>Gender:</p>
                <label>
                <input   type="radio" name="gender" value="male">
                Male</label><br>
                <input type="radio" name="gender" value="female">
                <label>Female</label><br>
                <p class="error"><?= isset($_SESSION["errors"]["gender"]) ? $_SESSION["errors"]["gender"] : '' ?></p>

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