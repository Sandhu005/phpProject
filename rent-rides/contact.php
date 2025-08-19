<?php
include("header.php");
?>

<body>
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active text-primary">Contact</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize text-primary mb-3">Contact Us</h1>
            </div>
            <div class="row g-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-5">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-0">123 Street New York.USA</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fas fa-envelope fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-0">info@example.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fa fa-phone-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-0">(+012) 3456 7890</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fab fa-firefox-browser fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Yoursite@ex.com</h4>
                                    <p class="mb-0">(+012) 3456 7890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5 rounded">
                        <h4 class="text-primary mb-4">Send Your Message</h4>
                        <?php
                            if(isset($_GET['msg'])){
                                echo '<div class="alert alert-danger" role="alert">'
                                        .htmlspecialchars($_GET["msg"]).
                                    '</div>';
                            }
                        ?>
                        <form action="" name="contactForm" method="post" onsubmit="return validateForm()">
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                                        <label for="firstName">First Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                                        <label for="lastName">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                                        <label for="phone">Your Phone</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 160px"></textarea>
                                        <label for="message">Message</label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button type="submit" name="sendBtn" class="btn btn-light w-100 py-3">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-xl-1 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex flex-xl-column align-items-center justify-content-center">
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-0 me-0 me-xl-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-5 bg-light rounded">
                        <div class="bg-white rounded p-4 mb-4">
                            <h4 class="mb-3">Our Branch 01</h4>
                            <div class="d-flex align-items-center flex-shrink-0 mb-3">
                                <p class="mb-0 text-dark me-2">Address:</p><i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street New York.USA</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-dark me-2">Telephone:</p><i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">(+012) 3456 7890</p>
                            </div>
                        </div>
                        <div class="bg-white rounded p-4 mb-4">
                            <h4 class="mb-3">Our Branch 02</h4>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0 text-dark me-2">Address:</p><i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street New York.USA</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-dark me-2">Telephone:</p><i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">(+012) 3456 7890</p>
                            </div>
                        </div>
                        <div class="bg-white rounded p-4 mb-0">
                            <h4 class="mb-3">Our Branch 03</h4>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0 text-dark me-2">Address:</p><i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street New York.USA</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-dark me-2">Telephone:</p><i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">(+012) 3456 7890</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="rounded">
                        <iframe class="rounded w-100"
                            style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->
    <!-- Adding to database -->
    <?php

    if (isset($_POST['sendBtn'])) {
        // Database File
        include('config.php');

        //Senitize User Data
        $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $flag = 0;
        $error = null;

        //Validations
        if (!preg_match("/^[a-zA-Z\s]+$/", $firstName)) {
            $error = "Only letters, spaces are allowed in the first name.";
            $flag = 1;
        }

        if (!preg_match("/^[a-zA-Z]+$/", $lastName)) {
            $error = "Only letters are allowed in the last name.";
            $flag = 1;
        }
        
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $error = "Invalid phone number!";
            $flag = 1;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Email not valid!";
            $flag = 1;
        }

        if (!preg_match("/^[a-zA-Z0-9\s,'-]*$/", $subject)) {
            $error = "Invalid characters in subject!";
            $flag = 1;
        }

        if (!preg_match("/^[a-zA-Z0-9\s,'\-\.!]*$/", $message)) {
            $error = "Invalid characters in message!";
            $flag = 1;
        }

        if (!($flag === 1)) {
            //Insert Into Database
            $query = mysqli_query($conn, "INSERT INTO `messages`(`firstName`, `lastName`, `phone`, `email`, `subject`, `message`) VALUES ('$firstName','$lastName','$phone','$email','$subject', '$message')");

            if ($query == 1) {
                echo '<script>
                 window.location.assign("contact.php?msg=Your message has been sent successfully!");
              </script>';
                exit;
            } else {
                echo '<script>
                 window.location.assign("contact.php?msg=Failed to send message!");
              </script>';
                exit;
            }

            mysqli_close($conn);
            exit;
        } else {
            echo '<script>
                window.location.assign("contact.php?msg=' . $error . '");
            </script>';
        }
    }

    ?>

    <!-- Form Validation with JS -->
    <script>
        function validateForm() {
            const form = document.forms["contactForm"];
            const email = form["email"].value.trim();
            const firstName = form["firstName"].value.trim();
            const lastName = form["lastName"].value.trim();
            const subject = form["subject"].value.trim();
            const phone = form["phone"].value.trim();
            const message = form["message"].value.trim();

            const firstNamePattern = /^[a-zA-Z\s]+$/;
            const lastNamePattern = /^[a-zA-Z]+$/;
            const subjectPattern = /^[a-zA-Z0-9\s,'-]*$/;
            const messagePattern = /^[a-zA-Z0-9\s,'\-\.!]*$/;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phonePattern = /^[0-9]{10}$/;

            if (!firstNamePattern.test(firstName)) {
                alert("First Name can only contain letters, spaces");
                return false;
            }

            if (!lastNamePattern.test(lastName)) {
                alert("Last Name can only contain letters");
                return false;
            }

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (!phonePattern.test(phone)) {
                alert("Please enter a valid phone number (10 digits).");
                return false;
            }

            if (!subjectPattern.test(subject)) {
                alert("Invalid characters in subject!");
                return false;
            }

            if (!messagePattern.test(message)) {
                alert("Invalid characters in message!");
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
<?php
include("footer.php");
?>