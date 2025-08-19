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

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Profile</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active text-primary">Profile</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->



    <!-- Profile Card -->
    <div class="container-fluid py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize text-primary mb-3">Profile</h1>
                <p class="mb-0">You can edit your profile, track your bookings and give feedbacks here</p>
            </div>
        <div class="row justify-content-evenly">
            <div class="col-xl-4 wow fadeInUp" data-wow-delay="0.1s ">
                <div class="card">
                    <?php
                    if (isset($_GET['msg'])) {
                        echo '<div class="alert alert-success" role="alert">' . $_GET['msg'] . '</div>';
                    }
                    ?>
                    <img class="card-img-top" src="<?php echo "img/users/" . $data['profile_pic']; ?>" alt="no profile pic">
                    <div class="card-body text-center">
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
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                <table class="table border">
                    <thead>
                        <tr>
                            <th colspan="7" class="table-dark text-center">Bookings Record</th>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="col">#</th>
                            <th scope="col">Vehicle</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Status</th>
                            <th scope="col">Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $userId = $_SESSION['id'];
                        $r = mysqli_query($conn, "SELECT c.title, c.brand, c.model, c.image_url, b.* FROM bookings as b JOIN cars as c ON b.car_id=c.id WHERE b.user_id=$userId");

                        if (mysqli_num_rows($r) > 0) {
                            $num = 1;
                            while ($row = mysqli_fetch_assoc($r)) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $num; ?></th>
                                    <td><?php echo $row['brand'] . " " . $row['title']; ?></td>
                                    <td><?php echo $row['start_date']; ?></td>
                                    <td><?php echo $row['end_date']; ?></td>
                                    <td><?php echo $row['total_price']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a href="feedback.php" class="btn btn-outline-primary">
                                            <i class="bi bi-chat-square-quote"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                                $num++;
                            }
                        } else {
                            echo '<div class="col-4 my-5 alert alert-danger" role="alert">No Booking Yet!</div>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Footer -->
<?php
    include("footer.php");
}
?>