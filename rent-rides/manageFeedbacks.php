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
        $data = mysqli_query($conn, "SELECT u.name, f.* FROM feedbacks as f JOIN users as u ON f.user_id=u.id WHERE f.status='unsolved'");
        if (mysqli_num_rows($data) > 0) {
        ?>
            <div class="col-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Message</th>
                            <th scope="col">Rating</th>
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
                                <td><?php echo $row['message']; ?></td>
                                <td><?php echo $row['rating']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td>
                                    <a href="solveFeedback.php?feedbackId=<?php echo $row['id'] ?>">Solved</a> | <a href="deleteFeedback.php?feedbackId=<?php echo $row['id'] ?>">Delete</a>
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