<?php
include "../config/connection.php";
global $connection;

$email = $_GET['email'];
$query = "SELECT email FROM users WHERE  email='$email' LIMIT 1";
$data = mysqli_query($connection, $query);

/* $emailExists = mysqli_fetch_assoc($data);
 */
if ($data->num_rows > 0) {
    echo "$email is alredy exists";
} else {
    echo "$email is available";

}
/* $data = [
'error' => false,
'message' => "$email is available",
];
if($emailExists){
$data = [
'error' => true,
'message' => "$email Email exists",
];
} 
*/
/* echo json_encode($data);die;
 */