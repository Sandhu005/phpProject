<!-- Database Connection -->
<?php
include("config.php");
?>

<!-- Fetching Data -->
<?php
$search = $_GET['search'];
$data = mysqli_query($conn, "SELECT * FROM `cars` WHERE `title` LIKE '%$search%'");
if (mysqli_num_rows($data) > 0) {
    $num = 1;
    while ($row = mysqli_fetch_assoc($data)) {
?>

        <!-- Display Table -->
        <tr>
            <td scope="row"><?php echo $num; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['brand']; ?></td>
            <td><?php echo $row['model']; ?></td>
            <td><?php echo "$" . $row['price_per_day']; ?></td>
            <td><img src="img/<?php echo $row['image_url']; ?>" alt="" width="100px"></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <a class="btn btn-outline-success" href="editCar.php?carId=<?php echo $row['id']; ?>">Edit</a>
                
                <?php
                if ($row['status'] == 'active') {
                ?>
                    <a class="btn btn-outline-primary" href="delete.php?carId=<?php echo $row['id']; ?>">Delete</a>
                <?php
                } else {
                ?>
                    <a class="btn btn-outline-primary" href="solve.php?carId=<?php echo $row['id']; ?>">Unblock</a>
                <?php
                }
                ?>
            </td>
        </tr>
<?php
        $num++;
    }
} else {
    echo '<tr><td colspan="8"><div class="alert alert-danger" role="alert">No Record Found!</div></td></tr>';
}
?>