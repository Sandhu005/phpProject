<?php
include("config.php");

if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];
    $car_id = $_GET['car_id'];
    mysqli_query($conn, "UPDATE `bookings` SET `status`='Approved' WHERE `id` = $bookingId");
    mysqli_query($conn, "UPDATE `cars` SET `status`='inactive' WHERE `id` = '$car_id'");
    echo '<script>window.location.assign("manageBookings.php?msg=Booking has been aprroved!")</script>';
    exit();
}

?>