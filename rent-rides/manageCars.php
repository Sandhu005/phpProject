<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");
?>

<!-- Display Table -->
<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Price/Day</th>
                        <th scope="col">Despription</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($conn, "SELECT * FROM `cars`");
                    $num = 1;
                    while($row=mysqli_fetch_assoc($data)){
                        ?>
                    <tr>
                        <td scope="row"><?php echo $num; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['brand']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo "$".$row['price_per_day']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><a href="">Edit</a> | <a href="">Delete</a></td>
                    </tr>
                    <?php
                    $num++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
include("adminFooter.php");
?>