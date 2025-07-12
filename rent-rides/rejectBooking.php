<?php
include("config.php");

if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];
    mysqli_query($conn, "UPDATE `bookings` SET `status`='Rejected' WHERE `id` = $bookingId");
    echo '<script>window.location.assign("manageBookings.php?msg=Booking has been rejected!")</script>';
    exit();
}

?>