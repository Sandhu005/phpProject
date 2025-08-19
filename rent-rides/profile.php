<!-- Header -->
<?php
include("header.php");
if (!isset($_SESSION['id'])) {
    echo '<script>window.location.assign("index.php");</script>';
} else {
    include("config.php");
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$userId'");
    $data = mysqli_fetch_array($query);

    if (isset($_GET['msg'])) {
        echo '<div class="alert alert-warning" role="alert">' . $_GET['msg'] . '</div>';
    }
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
                    <img class="card-img-top" src="<?php echo "img/users/" . $data['profile_pic']; ?>" alt="no profile pic">
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
        <div class="row justify-content-evenly">
            <?php
            $userId = $_SESSION['id'];
            $r = mysqli_query($conn, "SELECT c.title, c.brand, c.model, c.image_url, b.* FROM bookings as b JOIN cars as c ON b.car_id=c.id WHERE b.user_id=$userId");

            if (mysqli_num_rows($r) > 0) {
                while ($row = mysqli_fetch_assoc($r)) {
            ?>

                    <div class="col-3 my-5 card wow fadeInUp" data-wow-delay="0.1s">
                        <div class="categories-item p-2 pt-4">
                            <div class="categories-item-inner">
                                <div class="categories-img rounded-top">
                                    <img src="img/<?php echo $row['image_url']; ?>" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="categories-content rounded-bottom text-center">
                                    <h4 class="pt-2"><?php echo $row['brand'] . " " . $row['title'] . "(" . $row['model'] . ")"; ?></h4>
                                    <div class="categories-review">
                                        <div class="text-center"><?php echo "Start Date " . $row['start_date']; ?></div>
                                        <div class="text-center"><?php echo "End Date " . $row['end_date']; ?></div>
                                    </div>
                                    <div class="row text-center mb-1">
                                        <div class="col">
                                            <?php echo "Total Cost - Rs. " . $row['total_price']; ?>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-5 p-1 border rounded-pill bg-primary text-white"><?php echo $row['status']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<div class="col-4 my-5 alert alert-danger" role="alert">No Booking Found!</div>';
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
<?php
    include("footer.php");
}
?>