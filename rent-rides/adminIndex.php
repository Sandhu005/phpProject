<?php
include("adminHeader.php");
include("config.php");

$feedbackQuery = mysqli_query($conn, "SELECT `status` FROM `feedbacks` WHERE `status`='unsolved'");
$totalFeedbacks = mysqli_num_rows($feedbackQuery);

$bookingQuery = mysqli_query($conn, "SELECT `status` FROM `bookings` WHERE `status`='pending'");
$totalBookings = mysqli_num_rows($bookingQuery);

$carQuery = mysqli_query($conn, "SELECT `status` FROM `cars` WHERE `status`='active'");
$totalCars = mysqli_num_rows($carQuery);

$userQuery = mysqli_query($conn, "SELECT `status` FROM `users`");
$totalUsers = mysqli_num_rows($userQuery);
?>
<div class="container-fluid">
    <!-- Cards Row-1 -->
    <div class="row justify-content-evenly my-5">
        <div class="col-lg-2 card text-center pb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalFeedbacks; ?></h5>
                <p class="card-text">Unsolved Feedbacks</p>
            </div>
            <a href="manageFeedbacks.php" class="btn btn-primary">Manage Now</a>
        </div>
        <div class="col-lg-2 card text-center pb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalBookings; ?></h5>
                <p class="card-text">Pending Bookings</p>
            </div>
            <a href="manageBookings.php" class="btn btn-primary">Manage Now</a>
        </div>
        <div class="col-lg-2 card text-center pb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalCars; ?></h5>
                <p class="card-text">Cars Available</p>
            </div>
            <a href="manageCars.php" class="btn btn-primary">Manage Now</a>
        </div>
        <div class="col-lg-2 card text-center pb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalUsers; ?></h5>
                <p class="card-text">Total Users</p>
            </div>
            <a href="manageUsers.php" class="btn btn-primary">Manage Now</a>
        </div>
    </div>
</div>
<?php
include("adminFooter.php");
?>