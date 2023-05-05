<?php

include "../layouts/header.php"; 
include "../config/functions.php";


global $connection;

$userId = $_SESSION["USER_ID"];
if (!$userId) {
    header("location:../pages/signIn.php");
    die;
}
/*  $sql = "DELETE FROM users WHERE id=$userId";
 */ 


 $sql = delete('users', $userId );
 var_dump( $userId );

/*  if ($connection->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $connection->error;
  }
  
  $connection->close(); */