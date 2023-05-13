<?php
include "../layouts/header.php";
include dirname(__DIR__) . "/config/connection.php";

$userId = $_SESSION["USER_ID"];
if (!$userId) {
    header("location:../pages/signIn.php");
    die;
}
$query = "SELECT `firstname`,`lastname`, `avatar`,`gender`, `email`,`birthday` FROM users WHERE id=$userId LIMIT 1";
$data = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($data);

?>
<div class="container">
    <div class="contactForm">
        <form action="<?php echo BASE_URL; ?>actions/editProfileAction.php" method="post" autocomplate="off">
            <div class='registration_page'>
                <h2 class="signup">Update Page</h2>
            </div>

            <div class="inputBox">
                <input type="text" name="firstname" id="firstname" value="<?= $user['firstname'] ?>">
                <span>First Name *</span>
                <p class="error">
                    <?= isset($_SESSION["errors"]["firstname"]) ? $_SESSION["errors"]["firstname"] : '' ?>
                </p>
            </div>
            <div class="inputBox">
                <input type="text" name="lastname" id="lastname" value="<?= $user['lastname'] ?>">
                <span>Last Name *</span>
                <p class="error">
                    <?= isset($_SESSION["errors"]["lastname"]) ? $_SESSION["errors"]["lastname"] : '' ?>
                </p>
            </div>
            <div class="inputBox">
                <input type="text" name="email" id="email" value="<?= $user['email'] ?>">
                <span>Email *</span>
                <p class="error">
                    <?= isset($_SESSION["errors"]["email"]) ? $_SESSION["errors"]["email"] : '' ?>
                </p>
            </div>
            <div class="inputBox">
                <input id="date" type="date" name="birthday" id="birthday"
                     value="<?= $user['birthday'] ?>">
                <span>Birthday*</span>
                <p class="error">
                    <?= isset($_SESSION["errors"]["birthday"]) ? $_SESSION["errors"]["birthday"] : '' ?>
                </p>
            </div>
            <div class="radio__contant" id="gen">
                <p>Gender:</p>
                <label>
                    <input type="radio" name="gender" value="male">
                    Male</label><br>
                <input type="radio" name="gender" value="female">
                <label>Female</label><br>
                <p class="error">
                    <?= isset($_SESSION["errors"]["gender"]) ? $_SESSION["errors"]["gender"] : '' ?>
                </p>

            </div>
            <div class="inputBox">
                <input type="submit" value="Update" name="submit">
            </div>
        </form>
    </div>
</div>

<?php
include "../layouts/footer.php";
        ?>