<?php
include "../config/connection.php";
$userId = $_SESSION["USER_ID"];
if (!$userId) {
    header("location:../pages/signIn.php");
    die;
}
$query = "SELECT CONCAT(`firstname`,' ',`lastname`) as `fullname`, `avatar`,`gender`, `email`,`birthday` FROM users WHERE id=$userId LIMIT 1";
$data = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($data);
// Select user with id
include "../layouts/header.php";
?>
<div class="logOut">
    <h1>Welcome </h1>
    <?php if (!$user['avatar']) {
         $src = BASE_URL . 'images/' . $user['gender'] . '.jpg';

        $user['gender'] == "male" ? '<img src="../images/male.jpg" />' :   '<img src="../images/female.jpg" />'; 
         
    } else {
        $src = UPLOADS . $user['avatar'];
    } ?>
    <label>
        <form action="<?php echo BASE_URL; ?>actions/uploadAvatarAction.php" method="post"
            enctype="multipart/form-data">
            <input class="hide" type="file" name="avatar" onchange="getImagePreview(event)">
            <div id="preview">
                 <img width="100" src="<?php echo $src ?>" alt="">
            </div>
            <div class="upload_submit" style="display: none;" id="uploadSub">
                <input type="submit" value="Upload" name="upload">
            </div>
        </form>
        <p class="error">
            <?= isset($_SESSION["errors"]["upload"]) ? $_SESSION["errors"]["upload"] : '' ?>
        </p>

        <div>
            <a href="<?php echo BASE_URL; ?>pages/update.php" class="edit_profile">Edit Prrofile</a>
        </div>
        <div class="insert">
            <a href="<?php echo BASE_URL; ?>pages/insert.php" class="insert_data">Insert Data</a>
        </div>
    </label>
    <p>
        <?php echo $user['fullname'] ?>
    <p>
    <p>
        <?php echo $user['email'] ?>
    </p>
    <p>
        <?php echo $user['birthday'] ?>
    </p>
    <p>
        <?php echo $user['gender'] ?>
    </p>
    <p>Click here to&ensp;<a href="../actions/logout.php">Logout</a></p>
</div>

<?php include "../layouts/footer.php"; ?>