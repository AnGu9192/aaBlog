<?php
include "../config/connection.php";
global $connection;

$email = $_GET['email'];
$query = "SELECT email FROM users WHERE  email='$email' LIMIT 1";
$data = mysqli_query($connection, $query);
$emailExists = mysqli_fetch_assoc($data);
$data = [
    'error' => false,
    'message' => "$email is available",
];

if($emailExists){
    $data = [
        'error' => true,
        'message' => "$email Email exists",
    ];
}
echo json_encode($data);die;