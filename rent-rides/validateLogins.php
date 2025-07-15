<?php
session_start();
include("config.php");

$email = $_POST['email'];
$pwd = md5($_POST['pwd']);

$query = "SELECT * FROM `users` WHERE `email`='$email' && `password`='$pwd'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
 
if(mysqli_num_rows($result)>0){
    if($row['status']=='active'){
        $_SESSION['userId'] = $row['id'];
        header("location: index.php");
    }else{
        header("location: login.php?msg=Your account has been blocked!");
    }
}else{
    header("location: login.php?msg=User not found!");
}
?>