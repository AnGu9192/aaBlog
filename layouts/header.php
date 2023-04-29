<?php include dirname(__DIR__) . "/config/constants.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anna | Blog</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">

</head>

<body>
    <main>
        <nav class="navbar">
            <ul>
                <li><a href="../index.php" class="active">Home </a></li>
                <li><a href="<?php echo BASE_URL; ?>pages/projects.php">Projects</a></li>
                <li>Experience</li>
                <?php if (!$userId) { ?>
                    <li><a class="btnLogin-popup" href="<?php echo BASE_URL; ?>pages/signIn.php">SignIn</a></li>
                <?php } ?>
            </ul>
        </nav>
        <div class="content">