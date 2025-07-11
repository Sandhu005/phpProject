<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");

$id = $_GET['id'];
$q = "SELECT `name`, `email`, `password`, `contact`, `address`, `status` FROM `users` WHERE `id` = '$id'";
$r = mysqli_query($conn, $q);
$d = mysqli_fetch_assoc($r);
?>

<!-- Form Start -->
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-secondary p-5 rounded">
                <h4 class="text-primary mb-4">Update User</h4>
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
                         <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <select name="status" id="" class="form-control" required>
                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-light w-50 py-3" name="addBtn">Update User</button>
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
    $pwd = $_POST['pwd'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $status = $_POST['status'];

    $query = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$pwd',`contact`='$contact',`address`='$address',`status`='$status' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result == 1) {
        echo '<script>
                window.location.assign("manageUsers.php?msg=User Updated Successfully!");
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
    if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href);
    }
 </script>

<!-- Footer -->
<?php
include("adminFooter.php");
?>