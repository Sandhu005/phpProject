<!-- Header and Database Connection -->
<?php

include("adminHeader.php");
include("config.php");

$query = mysqli_query($conn, "SELECT * FROM `catagories`");

?>

<!-- Display Table -->
<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-10">
            <table class="table">
                <thead>
                    <tr>
                        <!-- Displaying Get msg -->
                        <?php
                        if (isset($_GET['msg'])) {
                            echo "<tr><td colspan='8'><div class='alert alert-success' role='alert'>" . $_GET['msg'] . 
                            "</div></td></tr>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $num = 1;
                            while($row = mysqli_fetch_assoc($query)){
                        ?>

                        <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><img src="<?php echo 'img/'.$row['img_url']; ?>" alt="" width="100px"></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><a href="editCatagory.php?catId=<?php echo $row['id']; ?>">Edit</a> | <a href="deleteCatagory.php?catId=<?php echo $row['id']; ?>">Delete</a></td>
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