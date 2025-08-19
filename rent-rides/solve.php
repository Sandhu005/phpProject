<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    echo '<script>window.location.assign("index.php");</script>';
} else {
    include("config.php");
    if (isset($_GET['messageId'])) {

        $messageId = $_GET['messageId'];

        $query = mysqli_query($conn, "UPDATE `messages` SET `status`='solved' WHERE `id`='$messageId'");
        if ($query == 1) {
            header("location: manageMessages.php?msg=Message Updated succesfully!");
            exit;
        } else {
            header("location: manageMessages.php?msg=Failed to Update Message!");
            exit;
        }
    } elseif (isset($_GET['feedbackId'])) {

        $feedbackId = $_GET['feedbackId'];

        $query = mysqli_query($conn, "UPDATE `feedbacks` SET `status`='solved' WHERE `id`='$feedbackId'");
        if ($query == 1) {
            header("location: manageFeedbacks.php?msg=Feedback Updated succesfully!");
            exit;
        } else {
            header("location: manageFeedbacks.php?msg=Failed to Update Feedback!");
            exit;
        }
    } elseif (isset($_GET['booking_id'])) {

        $bookingId = $_GET['booking_id'];
        $car_id = $_GET['car_id'];

        mysqli_query($conn, "UPDATE `bookings` SET `status`='Approved' WHERE `id` = $bookingId");
        mysqli_query($conn, "UPDATE `cars` SET `status`='inactive' WHERE `id` = '$car_id'");

        echo '<script>window.location.assign("manageBookings.php?msg=Booking has been aprroved!")</script>';
        exit();
    } elseif (isset($_GET['catId'])) {

        $catId = $_GET['catId'];

        mysqli_query($conn, "UPDATE `catagories` SET `status`='active' WHERE `id` = '$catId'");

        echo '<script>window.location.assign("manageCatagory.php?msg=Category has been unblocked!")</script>';
        exit();
    } elseif (isset($_GET['carId'])) {

        $carId = $_GET['carId'];

        mysqli_query($conn, "UPDATE `cars` SET `status`='active' WHERE `id` = '$carId'");

        echo '<script>window.location.assign("manageCars.php?msg=Car has been unblocked!")</script>';
        exit();
    }
}
