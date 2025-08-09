<?php
session_start();
include("config.php");

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pwd = md5($_POST['pwd']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location: login.php?msg=Invalid Email!");
} else {
    $query = "SELECT * FROM `users` WHERE `email`='$email' && `password`='$pwd'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        if ($row['status'] == 'active') {
            $_SESSION['id'] = $row['id'];
            header("location: index.php");
        } else {
            header("location: login.php?msg=Your account has been blocked!");
        }
    } else {
        header("location: login.php?msg=Invalid Email or Password!");
    }
}
