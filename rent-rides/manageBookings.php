<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");
?>

<!-- Display Table -->

<!-- Displaying Get msg -->
<?php
if (isset($_GET['msg'])) {
    echo "<div class='alert alert-success' role='alert'>" . $_GET['msg'] . "</div>";
}
?>

<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <?php
        $data = mysqli_query($conn, "SELECT u.name, c.title, b.* FROM bookings as b JOIN users as u ON b.user_id=u.id JOIN cars as c on b.car_id=c.id WHERE b.status='pending'");
        if (mysqli_num_rows($data) > 0) {
        ?>
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
                        $num = 1;
                        while ($row = mysqli_fetch_assoc($data)) {
                        ?>
                            <tr>
                                <td scope="row"><?php echo $num; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['start_date']; ?></td>
                                <td><?php echo $row['end_date']; ?></td>
                                <td><?php echo "$" . $row['total_price']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td>
                                    <a href="approveBooking.php?id=<?php echo $row['id']; ?>&car_id=<?php echo $row['car_id']; ?>">Approve</a> | <a href="rejectBooking.php?id=<?php echo $row['id']; ?>">Reject</a>
                                </td>
                            </tr>
                        <?php
                            $num++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        } else {
            echo '<div class="col-4 my-5 alert alert-danger" role="alert">No Record Found!</div>';
        }
        ?>
    </div>
</div>

<!-- Footer -->
<?php
include("adminFooter.php");
?>