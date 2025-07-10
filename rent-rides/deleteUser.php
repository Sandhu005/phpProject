<?php
include("config.php");

$id = $_GET['id']; 
$result = mysqli_query($conn, "DELETE FROM `users` WHERE `id` = '$id'");

if($result==1){
    echo "<script>window.location.assign('manageUsers.php?msg=User deleted successfully!');</script>";
    exit();
}
else{
    echo "<script>window.location.assign('manageUsers.php?msg=Failed to delete User!');</script>";
    exit();
}
?>