<!-- Header -->
<?php
include("header.php");
include("config.php");
?>

<!-- Register Form -->

<body>
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-secondary p-5 rounded">
                    <h4 class="text-primary mb-4">Fill Details to Register</h4>
                    <!-- Catching error -->
                    <?php if (isset($_GET['msg'])): ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_GET['msg']; ?></div>
                    <?php
                    endif;
                    ?>
                    <form name="signupForm" action="" method="post" onsubmit="return validateForm()">
                        <div class="row g-4">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required>
                                    <label for="password">Your Password</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="phone" class="form-control" name="contact" id="contact" placeholder="Your Phone Number" required>
                                    <label for="contact">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="address" placeholder="Enter Your Address" id="address" style="height: 80px" required></textarea>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-light w-100 py-3" type="submit" name="addBtn">Sign Up</button>
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
        //Senitize User Data
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $contact = preg_replace('/[^0-9]/', '', $_POST['contact']);
        $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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

        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?#&_])[A-Za-z\d@$!%*?#&_]{8,}$/", $password)) {
            $error = "password must be atlest 8 characters and contain capital and small letters and special symbol!";
            $flag = 1;
        }else{
            $hashedPassword = md5($password);
        }

        if (strlen($contact) < 10) {
            $error = "Invalid phone number.";
            $flag = 1;
        }

        if (!preg_match("/^[a-zA-Z\s,'-]*$/", $address)) {
            $error = "Only letters, spaces are allowed in the name.";
            $flag = 1;
        }

        if (!($flag === 1)) {
            //Check if email already exists
            $checkEmail = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email`='$email'");

            if (mysqli_num_rows($checkEmail) > 0) {
                echo '<script>
                        window.location.assign("signup.php?msg=Email already registered!")
                    </script>';
                mysqli_close($conn);
                exit;
            }

            //Insert Into Database
            $query = mysqli_query($conn, "INSERT INTO `users`(`name`, `email`, `password`, `contact`, `address`) VALUES ('$name','$email','$hashedPassword','$contact','$address')");
            
            if ($query == 1) {
                echo '<script>
                 window.location.assign("login.php?msg=You have registered successfully, You may login now!");
              </script>';
              exit;
            } else {
                echo '<script>
                 window.location.assign("login.php?msg=Failed to register user!");
              </script>';
              exit;
            }

           mysqli_close($conn);
           exit;

        } else {
            echo '<script>
                window.location.assign("signup.php?msg='.$error.'");
            </script>';
        }
    }

    ?>

    <!-- Form Validation with JS -->
    <script>
    function validateForm() {
        const form = document.forms["signupForm"];
        const email = form["email"].value.trim();
        const name = form["name"].value.trim();
        const address = form["address"].value.trim();
        const password = form["password"].value;
        const contact = form["contact"].value.trim();

        const namePattern = /^[a-zA-Z\s]+$/;
        const addressPattern = /^[a-zA-Z0-9\s,'-]*$/;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phonePattern = /^[0-9]{10}$/;
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?#&_])[A-Za-z\d@$!%*?#&_]{8,}$/;

        if (!namePattern.test(name)) {
            alert("Name can only contain letters, spaces");
            return false;
        }

        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (!passwordPattern.test(password)) {
            alert("Password must be at least 8 characters and nust contain capital letter, small letter and special symbols.");
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
?>