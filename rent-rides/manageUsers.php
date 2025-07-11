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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($conn, "SELECT * FROM `users`");
                    $num = 1;
                    while($row=mysqli_fetch_assoc($data)){
                        ?>
                    <tr>
                        <td scope="row"><?php echo $num; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><a href="editUser.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="deleteUser.php?id=<?php echo $row['id']; ?>">Delete</a></td>
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