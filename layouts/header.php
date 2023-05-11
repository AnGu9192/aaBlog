<?php
session_start();
ini_set("error_reporting",E_ALL);
ini_set("display_errors",1);
include dirname(__DIR__) . "/config/constants.php";

$userId = @$_SESSION["USER_ID"];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anna | Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

   <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/projects.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>

<body>
    <main>
        <nav class="navbar d-flex justify-content-center">
            <ul>
                <li><a href="../index.php" class="active">Home </a></li>
                   <?php if (!$userId) { ?>
                <li><a href="<?php echo BASE_URL; ?>pages/projects.php">Projects</a></li>
                     <?php } else  { ?>
                                <li><a href="<?php echo BASE_URL; ?>pages/myprojects.php">Projects</a></li>
                     <?php } ?>
                <li>Experience</li>
                <?php if (!$userId) { ?>
                    <li><a class="btnLogin-popup" href="<?php echo BASE_URL; ?>pages/signIn.php">SignIn</a></li>
                    <li><a class="btnLogin-popup" href="<?php echo BASE_URL; ?>pages/signUp.php">SignUp</a></li>
                <?php } ?>

            </ul>
        </nav>
        <div class="content">
