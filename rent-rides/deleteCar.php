<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    echo '<script>window.location.assign("index.php");</script>';
} else {
    include("config.php");

    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM `cars` WHERE `id` = '$id'");

    if ($result == 1) {
        echo "<script>window.location.assign('manageCars.php?msg=Car deleted successfully!');</script>";
        exit();
    } else {
        echo "<script>window.location.assign('manageCars.php?msg=Failed to delete Car!');</script>";
        exit();
    }
}
