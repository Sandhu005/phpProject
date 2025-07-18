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

<!-- Fetching Data -->

<?php
$search = $_GET['search'];
$data = mysqli_query($conn, "SELECT * FROM `cars` WHERE `title` LIKE '%search%'");
if (mysqli_num_rows($data) > 0) {
    $num = 1;
    while ($row = mysqli_fetch_assoc($data)) {
?>
        <tr>
            <td scope="row"><?php echo $num; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['brand']; ?></td>
            <td><?php echo $row['model']; ?></td>
            <td><?php echo "$" . $row['price_per_day']; ?></td>
            <td><img src="img/<?php echo $row['image_url']; ?>" alt="" width="100px"></td>
            <td><?php echo $row['description']; ?></td>
            <td><a href="editCar.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="deleteCar.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
<?php
        $num++;
    }
} else {
    echo '<div class="col-4 my-5 alert alert-danger" role="alert">No Record Found!</div>';
}
?>
?>