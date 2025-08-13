<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");
?>

<!-- Display Table -->
<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <?php
        $data = mysqli_query($conn, "SELECT * FROM `messages` ORDER BY `created_at` DESC");
        if (mysqli_num_rows($data) > 0) {
        ?>
            <!-- Displaying Get msg -->
            <?php
            if (isset($_GET['msg'])) {
                echo "<div class='col-10 alert alert-success' role='alert'>" . $_GET['msg'] . "</div>";
            }
            ?>
            <div class="col-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
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
                                <td><?php echo $row['firstName'] . " " . $row['lastName']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['message']; ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 'Pending') {
                                    ?>
                                        <a class="btn btn-outline-success" href="solve.php?messageId=<?php echo $row['id'] ?>">Solved</a>
                                        <a class="btn btn-outline-primary" href="delete.php?messageId=<?php echo $row['id'] ?>">Delete</a>
                                </td>
                            <?php
                                    } else {
                                        echo '<em>No Action</em>';
                                    }
                            ?>
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