<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    echo '<script>window.location.assign("index.php");</script>';
} else {
    include("config.php");
    if (isset($_GET['messageId'])) {
        $messageId = $_GET['messageId'];

        $query = mysqli_query($conn, "DELETE FROM `messages` WHERE `id`='$messageId'");
        if ($query == 1) {
            header("location: manageMessages.php?msg=Message Deleted succesfully!");
            exit;
        } else {
            header("location: manageMessages.php?msg=Failed to Delete Message!");
            exit;
        }
    } elseif (isset($_GET['feedbackId'])) {

        $feedbackId = $_GET['feedbackId'];

        $query = mysqli_query($conn, "DELETE FROM `feedbacks` WHERE `id`='$feedbackId'");
        if ($query == 1) {
            header("location: manageFeedbacks.php?msg=Feedback Deleted succesfully!");
            exit;
        } else {
            header("location: manageFeedbacks.php?msg=Failed to Delete Feedback!");
            exit;
        }
    } elseif (isset($_GET['catId'])) {

        $catId = $_GET['catId'];

        $query = mysqli_query($conn, "UPDATE `catagories` SET `status`='inactive' WHERE `id`='$catId'");

        if ($query == 1) {
            header("location: manageCatagory.php?msg=Catagory Deleted Successfully!");
            exit();
        } else {
            header("location: manageCatagory.php?msg=Failed to Delete Catagory!");
            exit();
        }
    } elseif (isset($_GET['carId'])) {

        $carId = $_GET['carId'];

        $result = mysqli_query($conn, "UPDATE `cars` SET `status`='Block' WHERE `id` = '$carId'");

        if ($result == 1) {
            echo "<script>window.location.assign('manageCars.php?msg=Car deleted successfully!');</script>";
            exit();
        } else {
            echo "<script>window.location.assign('manageCars.php?msg=Failed to delete Car!');</script>";
            exit();
        }
    } elseif (isset($_GET['user_id'])) {

        $id = $_GET['user_id'];

        $result = mysqli_query($conn, "UPDATE `users` SET `status`='Block' WHERE `id`='$id'");

        if ($result == 1) {
            echo "<script>window.location.assign('manageUsers.php?msg=User deleted successfully!');</script>";
            exit();
        } else {
            echo "<script>window.location.assign('manageUsers.php?msg=Failed to delete User!');</script>";
            exit();
        }
    } elseif (isset($_GET['booking_id'])) {

        $bookingId = $_GET['booking_id'];

        $query = mysqli_query($conn, "UPDATE `bookings` SET `status`='Rejected' WHERE `id` = $bookingId");

        if ($query == 1) {
            echo '<script>window.location.assign("manageBookings.php?msg=Booking has been rejected!")</script>';
            exit();
        } else {
            echo "<script>window.location.assign('manageBookings.php?msg=Failed to update booking!');</script>";
            exit();
        }
    }
}
