<!-- header and connection -->
<?php
include("header.php");

if (!isset($_SESSION['id'])) {
    echo '<script>window.location.assign("index.php");</script>';
} else {
    $result = mysqli_query($conn, "SELECT `name` FROM `users` WHERE `id`='$userId'");
    $data = mysqli_fetch_array($result);
?>

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Feedback</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Feedback</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize text-primary mb-3">Feedback</h1>
            </div>
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-secondary p-5 rounded">
                    <h4 class="text-primary mb-4">Share Your Feedback</h4>
                    <form action="" method="post">
                        <div class="row g-4">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Default select example" name="userId">
                                        <option value="" selected><?php echo $data['name']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="number" min="1" max="5" class="form-control" id="rating" name="rating" placeholder="Rate Us" required>
                                    <label for="rating">Rate Us</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 160px" required></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-light w-100 py-3" name="shareBtn">Share Feeback</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Adding to database -->
    <?php

    if (isset($_POST['shareBtn'])) {
        $msg = $_POST['message'];
        $rating = $_POST['rating'];

        $query = mysqli_query($conn, "INSERT INTO `feedbacks`(`user_id`, `message`, `rating`) VALUES ('$userId', '$msg', '$rating')");

        if ($query == 1) {
            echo '<div class="alert alert-success" role="alert">Feedback Shared Successfully!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Failed to share your feedback!</div>';
        }
    }
    ?>

    <!-- Prevention from resubmission -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <!-- Footer -->
<?php
    include("footer.php");
}
?>