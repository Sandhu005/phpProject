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

    <body>
        <!-- Form Start -->
        <div class="container-fluid py-5">
            <div class="row justify-content-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5 rounded">
                        <h4 class="text-primary mb-4">Edit Profile</h4>
                        <?php
                        if (isset($_GET['msg'])) {
                            echo '<div class="alert alert-warning" role="alert">' . $_GET['msg'] . '</div>';
                        }
                        ?>
                        <form action="" name="profileUpdateForm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                                    <div class="form-floating">
                                        <input type="file" class="form-control" name="newPhoto" id="newPhoto" accept=".jpg,.jpeg,.png">
                                        <label for="photo">Upload Profile Pic</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="hidden" class="form-control" name="oldPhoto" id="oldPhoto" accept=".jpg,.jpeg,.png" value="<?php echo $d['profile_pic']; ?>">
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
            //Senitize User Data
            $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $contact = preg_replace('/[^0-9]/', '', $_POST['contact']);
            $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $oldPhoto = filter_var($_POST['oldPhoto'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $flag = 0;
            $error = null;

            //Validations
            if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
                $error = "Only letters, spaces are allowed in the name.";
                $flag = 1;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Email not valid";
                $flag = 1;
            }

            if (!preg_match("/^[0-9]{10}$/", $contact)) {
                $error = "Invalid phone number.";
                $flag = 1;
            }

            if (!preg_match("/^[a-zA-Z\s,'-]*$/", $address)) {
                $error = "Only letters, spaces are allowed in the name.";
                $flag = 1;
            }

            if (!empty($_FILES['newPhoto']['tmp_name'])) {
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpeg'];
                $maxSize = 2 * 1024 * 1024; // 2MB max

                $fileTmpPath = $_FILES['newPhoto']['tmp_name'];
                $fileName = $_FILES['newPhoto']['name'];
                $fileSize = $_FILES['newPhoto']['size'];

                // Validate MIME
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimeType = finfo_file($finfo, $fileTmpPath);
                finfo_close($finfo);

                if (!in_array($mimeType, $allowedTypes)) {
                    $error = "Only JPG, JPEG and PNG files are allowed.";
                    $flag = 1;
                } elseif ($fileSize > $maxSize) {
                    $error = "File size exceeds 2MB limit.";
                    $flag = 1;
                } else {
                    $newFileName = uniqid() . '-' . $fileName;
                    $destPath = 'img/users/' . $newFileName;

                    if (!move_uploaded_file($fileTmpPath, $destPath)) {
                        $error = "Failed to upload profile picture.";
                        $flag = 1;
                    }
                }
            } else {
                $newFileName = $oldPhoto;
            }

            if (!($flag === 1)) {
                $query = "UPDATE `users` SET `name`='$name',`email`='$email',`contact`='$contact',`address`='$address', `profile_pic`='$newFileName' WHERE `id` = '$userId'";
                $result = mysqli_query($conn, $query);

                if ($result == 1) {
                    echo '<script>
                    window.location.assign("profile.php?msg=Profile Updated Successfully!");
                    </script>';
                    exit();
                } else {
                    echo '<script>
                        window.location.assign("profile.php?msg=Failed to Update Profile!");
                    </script>';
                }
                mysqli_close($conn);
                exit;
            } else {
                echo '<script>
                        window.location.assign("editProfile.php?msg=' . $error . '");
                    </script>';
            }
        }

        ?>
        <!-- Form Validation with JS -->
        <script>
            function validateForm() {
                const form = document.forms["profileUpdateForm"];
                const email = form["email"].value.trim();
                const name = form["name"].value.trim();
                const address = form["address"].value.trim();
                const contact = form["contact"].value.trim();
                const fileInput = form["newPhoto"];
                const file = fileInput.files[0];

                const namePattern = /^[a-zA-Z\s]+$/;
                const addressPattern = /^[a-zA-Z0-9\s,'-]*$/;
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const phonePattern = /^[0-9]{10}$/;

                if (!namePattern.test(name)) {
                    alert("Name can only contain letters, spaces");
                    return false;
                }

                if (!emailPattern.test(email)) {
                    alert("Please enter a valid email address.");
                    return false;
                }

                if (!phonePattern.test(contact)) {
                    alert("Please enter a valid phone number (10 digits).");
                    return false;
                }

                if (!addressPattern.test(address)) {
                    alert("Invalid characters in address!");
                    return false;
                }

                if (file) {
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpeg'];
                    const maxSizeMB = 2;

                    if (!allowedTypes.includes(file.type)) {
                        alert("Only JPG, JPEG and PNG images are allowed.");
                        return false;
                    }

                    if (file.size > maxSizeMB * 1024 * 1024) {
                        alert("File size must be less than 2MB.");
                        return false;
                    }
                }

                return true;
            }
        </script>
        <!-- Preventing from resubmission -->
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </body>
    <!-- Footer -->
<?php
    include("footer.php");
}
?>