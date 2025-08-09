<?php
session_start();
include("config.php");

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pwd = $_POST['pwd'];

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location: login.php?msg=Invalid Email!");
    exit;
}

// Fetch user from DB
$query = "SELECT * FROM `users` WHERE `email`='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    // Verify password
    if (password_verify($pwd, $row['password'])) {
        if ($row['status'] == 'active') {
            $_SESSION['id'] = $row['id'];
            header("location: index.php");
            exit;
        } else {
            header("location: login.php?msg=Your account has been blocked!");
            exit;
        }
    } else {
        header("location: login.php?msg=Invalid Password!");
        exit;
    }
} else {
    header("location: login.php?msg=User not found!");
    exit;
}
?>