<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");
?>

<!-- Display Table -->

<!-- Displaying Get msg -->
<?php
if(isset($_GET['msg'])){
    echo "<div class='alert alert-success' role='alert'>".$_GET['msg']."</div>";
}
?>

<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Car</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($conn, "SELECT * FROM `bookings` WHERE `status`='pending'");
                    $num = 1;
                    while($row=mysqli_fetch_assoc($data)){
                        $user_id = $row['user_id'];
                        $car_id = $row['car_id'];
                        $data2 = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$user_id'");
                        $data3 = mysqli_query($conn, "SELECT * FROM `cars` WHERE `id`='$car_id'");
                        $row2 = mysqli_fetch_array($data2);
                        $row3 = mysqli_fetch_array($data3);

                        ?>
                    <tr>
                        <td scope="row"><?php echo $num; ?></td>
                        <td><?php echo $row2['name']; ?></td>
                        <td><?php echo $row3['title']; ?></td>
                        <td><?php echo $row['start_date']; ?></td>
                        <td><?php echo $row['end_date']; ?></td>
                        <td><?php echo "$".$row['total_price']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><form action="" method="post"><button name="approveBtn">Approve</button>  <button name="rejectBtn">Reject</button></form></td>
                    </tr>
                    <?php
                    $num++;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Approve or Reject -->
 <?php
if(isset($_POST['approveBtn'])){
    $bookingId = $row['id'];
    mysqli_query($conn, "UPDATE `bookings` SET `status`='Approved' WHERE `id` = $bookingId");
    echo '<script>window.location.assign("manageBookings.php?msg=Booking has been aprroved!")</script>';
}elseif(isset($_POST['rejectBtn'])){
    $bookingId = $row['id'];
    mysqli_query($conn, "UPDATE `bookings` SET `status`='Rejected' WHERE `id` = $bookingId");
    echo '<script>window.location.assign("manageBookings.php?msg=Booking has been rejected!")</script>';
}
}
 ?>

<!-- Footer -->
<?php
include("adminFooter.php");
?>