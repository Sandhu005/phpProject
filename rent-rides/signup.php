<!-- Header -->
<?php
include("header.php");
include("config.php");
?>


<!-- Register Form -->
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-secondary p-5 rounded">
                <h4 class="text-primary mb-4">Fill Details to Register</h4>
                <form action="" method="post">
                    <div class="row g-4">
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
                                <label for="password">Your Password</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="phone" class="form-control" name="contact" id="contact" placeholder="Your Phone Number">
                                <label for="contact">Your Phone</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="address" placeholder="Enter Your Address" id="address" style="height: 80px"></textarea>
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-light w-100 py-3" name="addBtn">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Adding to database -->
<?php

if (isset($_POST['addBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $query = "INSERT INTO `users`(`name`, `email`, `password`, `contact`, `address`) VALUES ('$name', '$email', '$password', '$contact', '$address')";
    $result = mysqli_query($conn, $query);

    if ($result == 1) {
        echo '<script>
                    window.location.assign("login.php?msg=You have registered successfully, You may login now!");
            </script>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Failed to Register!
            </div>';
    }
mysqli_close($conn);
}

?>

<!-- Preventing from resubmission -->
 <script>
    if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href);
    }
 </script>

<!-- Footer -->
<?php
include("footer.php");
?>