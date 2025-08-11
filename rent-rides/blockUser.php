<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    echo '<script>window.location.assign("index.php");</script>';
} else {
    include("config.php");

    $id = $_GET['id'];
    $result = mysqli_query($conn, "UPDATE `users` SET `status`='Block' WHERE `id`='$id'");

    if ($result == 1) {
        echo "<script>window.location.assign('manageUsers.php?msg=User deleted successfully!');</script>";
        exit();
    } else {
        echo "<script>window.location.assign('manageUsers.php?msg=Failed to delete User!');</script>";
        exit();
    }
}
