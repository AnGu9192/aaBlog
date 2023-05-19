<?php
include "../layouts/header.php";

?>
  <div class="container">
  <div class="contactForm">
        <form action="<?php echo BASE_URL; ?>actions/signInAction.php" method="post" autocomplete="off">
        <div class='sign_page'>
            <h2 class='signin active'>SignIn</h2>
            <h5 class="dont_account">Don't have an account?<a href="../pages/signUp.php">Sign Up</a></h5>
            </div>

            <div class="inputBox">
                <input type="text"  name="email" value="<?= isset($_SESSION["old"]["email"])?$_SESSION["old"]["email"]:'' ?>">
                <span>Email</span>
                <p class="error"><?= isset($_SESSION["errors"]["email"])?$_SESSION["errors"]["email"]:'' ?></p>

            </div>
            <div class="inputBox">
                <input type="password" name="password" value="<?= isset($_SESSION["old"]["password"])?$_SESSION["old"]["password"]:'' ?>">
                <span>Password</span>
                <p class="error"><?= isset($_SESSION["errors"]["password"])?$_SESSION["errors"]["password"]:'' ?></p>
            </div>

            <div class="inputBox">
               <input type="submit" value="Log in" name="submit">
            </div>
         
            
        </form>

    </div>

  </div>
    

<?php include "../layouts/footer.php"; ?>