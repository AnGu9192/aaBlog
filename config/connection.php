<?php
include dirname(__DIR__) . "/config/db.php";
session_start();
$connection = mysqli_connect(HOST,USER, PASS, DBNAME);