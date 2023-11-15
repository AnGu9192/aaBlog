<?php
//include dirname(__DIR__) . "/config/connection.php";
include "../layouts/header.php";


global $connection;
$userId = $_SESSION["USER_ID"];
if (!$userId) {
    header("location:../pages/signIn.php");
    die;
}
$query = "SELECT CONCAT(`firstname`,' ',`lastname`) as `fullname`, `avatar`,`gender`, `email`,`birthday` FROM users WHERE id=$userId LIMIT 1";
$data = mysqli_query($connection, $query);

$user = mysqli_fetch_assoc($data);
// Select user with id
?>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #3498DB;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>

<div class="logOut">
    <h1>Welcome </h1>
    <?php if (!$user['avatar']) {
        $src = BASE_URL . 'images/' . $user['gender'] . '.jpg';

        $user['gender'] == "male" ? '<img src="../images/male.jpg" />' : '<img src="../images/female.jpg" />';

} else {
    $src = UPLOADS . $user['avatar'];
} ?>

<div class="card">
  <label>
       <form action="<?php echo BASE_URL; ?>actions/uploadAvatarAction.php" method="post"
            enctype="multipart/form-data">
            <input class="hide" type="file" name="avatar" onchange="getImagePreview(event)">
            <div id="preview">
                <img width="100" src="<?php echo $src ?>" alt="" >
            </div>
            <div class="upload_submit" style="display: none;" id="uploadSub">
                <input type="submit" value="Upload" name="upload">
            </div>
        </form>
        <p class="error">
            <?= isset($_SESSION["errors"]["upload"]) ? $_SESSION["errors"]["upload"] : '' ?>
        </p>

        </label>

<br>
  <h3><b>  <p>
        <?php echo $user['fullname'] ?>
    <p></b></h3>
    <p>
        <?php echo $user['email'] ?>
    </p>
    <p>
        <?php echo $user['birthday'] ?>
    </p>
    <p>
        <?php echo $user['gender'] ?>
    </p>


        <div class="actions">
            <div>
                <a href="<?php echo BASE_URL; ?>pages/updateProfile.php" class="edit_profile">Edit Profile</a>
            </div>
            <div>
                <a href="<?php echo BASE_URL; ?>actions/deleteUserAction.php" class="edit_profile"  onclick="return checkDelete()">Delete User</a>
            </div>
        </div>
  <p><a href="https://github.com/AnGu9192/" class="button">Profile</a></p>
</div>


</div>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
<?php include "../layouts/footer.php"; ?>