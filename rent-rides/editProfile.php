<!--Php for Header and secure access -->
<?php
include("header.php");
if (!isset($_SESSION['id'])) {
    echo '<script>window.location.assign("index.php");</script>';
} else {
    include("config.php");
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$userId'");
    $d = mysqli_fetch_array($query);
?>

    <!-- Form Start -->
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-secondary p-5 rounded">
                    <h4 class="text-primary mb-4">Edit Profile</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $d['name']; ?>" required>
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $d['email']; ?>" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" value="<?php echo $d['password']; ?>" required>
                                    <label for="pwd">Password</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo $d['contact']; ?>" required>
                                    <label for="contact">Contact</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $d['address']; ?>" required>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-light w-50 py-3" name="updateBtn">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Adding to database -->
    <?php

    if (isset($_POST['updateBtn'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = md5($_POST['pwd']);
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        $query = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$pwd',`contact`='$contact',`address`='$address' WHERE `id` = '$userId'";
        $result = mysqli_query($conn, $query);

        if ($result == 1) {
            echo '<script>
                window.location.assign("profile.php?msg=User Updated Successfully!");
                </script>';
            exit();
        } else {
            echo '<div class="alert alert-danger" role="alert">
                Failed to Update User!
            </div>';
        }
    }

    ?>

    <!-- Preventing from resubmission -->
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