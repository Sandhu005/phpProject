<!-- Header -->
<?php
include("header.php");
if (!isset($_SESSION['id'])) {
    echo '<script>window.location.assign("index.php");</script>';
} else {
    include("config.php");
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$userId'");
    $data = mysqli_fetch_array($query);
?>

    <!-- Profile Card -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4 my-5 text-center">
                <div class="card">
                    <?php
                    if (isset($_GET['msg'])) {
                        echo '<div class="alert alert-success" role="alert">' . $_GET['msg'] . '</div>';
                    }
                    ?>
                    <img class="card-img-top" src="" alt="no profile pic">
                    <div class="card-body">
                        <div class="card-title"><?php echo '<h4>' . $data['name'] . '</h4>'; ?></div>
                        <p class="card-text">
                        <ul class="list-unstyled">
                            <li>Your Email - <?php echo $data['email']; ?></li>
                            <li class="my-3">Your Contact - <?php echo $data['contact']; ?></li>
                            <li>Your Address - <?php echo $data['address']; ?></li>
                        </ul>
                        </p>
                        <a href="editProfile.php" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
<?php
    include("footer.php");
}
?>