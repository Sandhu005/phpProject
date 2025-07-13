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
        <div class="col-10">
            <?php
            $data = mysqli_query($conn, "SELECT * FROM `cars`");
            if (mysqli_num_rows($data) > 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Model</th>
                            <th scope="col">Price/Day</th>
                            <th scope="col">Image</th>
                            <th scope="col">Despription</th>
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
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['model']; ?></td>
                                <td><?php echo "$" . $row['price_per_day']; ?></td>
                                <td><?php echo $row['image_url']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><a href="editCar.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="deleteCar.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                            </tr>
                        <?php
                            $num++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo '<div class="col-4 my-5 alert alert-danger" role="alert">No Record Found!</div>';
            }
            ?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
include("adminFooter.php");
?>