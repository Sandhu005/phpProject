<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Cental - Car Rent Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid">
            <div class="container nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="adminIndex.php" class="navbar-brand p-0">
                        <h1 class="display-6 text-primary">Dashboard</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto py-0">
                            <a href="adminIndex.php" class="nav-item nav-link active">Dashboard</a>
                            <a href="addCatagory.php" class="nav-item nav-link">Catagory</a>
                            <a href="manageUsers.php" class="nav-item nav-link">Users</a>

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Cars</a>
                                <div class="dropdown-menu m-0">
                                    <a href="addCars.php" class="dropdown-item">Add Cars</a>
                                    <a href="manageCars.php" class="dropdown-item">Manage Cars</a>
                                </div>
                            </div>

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Bookings</a>
                                <div class="dropdown-menu m-0">
                                    <a href="manageBookings.php" class="dropdown-item">View Bookings</a>
                                    <a href="manageBookings.php" class="dropdown-item">Manage Bookings</a>
                                </div>
                            </div>
                            <a href="manageFeedbacks.php" class="nav-item nav-link">Feedbacks</a>
                        </div>
                        <a href="login.php" class="btn btn-primary rounded-pill py-2 px-4">Logout</a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->
