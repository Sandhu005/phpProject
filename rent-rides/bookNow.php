 <!-- Header -->
 <?php

    include("header.php");
    if (!isset($_SESSION['id'])) {
        echo '<script>window.location.assign("index.php");</script>';
    } else {
        if (isset($_GET['car_id'])) {
            $car_id = $_GET['car_id'];

            $q = mysqli_query($conn, "SELECT `title`, `price_per_day` FROM `cars` WHERE `id`=$car_id");
            $data = mysqli_fetch_array($q);
        }else{
            $q2 = mysqli_query($conn, "SELECT `title`, `price_per_day` FROM `cars`");
        }
    ?>

     <!-- Carousel Start -->
     <div class="header-carousel">
         <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
             <div class="carousel-inner" role="listbox">
                 <div class="carousel-item active">
                     <img src="img/carousel-2.jpg" class="img-fluid w-100" alt="First slide" />
                     <div class="carousel-caption">
                         <div class="container py-4">
                             <div class="row g-5">
                                 <div class="col-lg-6 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                     <div class="bg-secondary rounded p-5">
                                         <h4 class="text-white mb-4">CONTINUE CAR RESERVATION</h4>
                                         <form action="" method="post">
                                             <div class="row g-3">
                                                 <div class="col-12">
                                                     <select class="form-select" aria-label="Default select example" name="car_id">
                                                        <?php
                                                        if(isset($_GET['car_id'])){
                                                            echo '<option value="'.$car_id.'" selected>'.$data['title'].'</option>';
                                                        }else{
                                                             echo '<option value="" selected disabled>Select Car</option>';
                                                            while($row = mysqli_fetch_assoc($q2)){
                                                                echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                                                            }
                                                        }
                                                         ?>
                                                     </select>
                                                 </div>
                                                 <div class="col-12">
                                                     <div class="input-group">
                                                         <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                             <span class="fas fa-calendar-alt"></span><span class="ms-1">Pick Up</span>
                                                         </div>
                                                         <input class="form-control" type="date" name="start_date">
                                                     </div>
                                                 </div>
                                                 <div class="col-12">
                                                     <div class="input-group">
                                                         <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                             <span class="fas fa-calendar-alt"></span><span class="ms-1">Drop off</span>
                                                         </div>
                                                         <input class="form-control" type="date" name="end_date">
                                                     </div>
                                                 </div>
                                                 <div class="col-12">
                                                     <div class="input-group">
                                                         <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                             <span class="fas fa-dollar-sign"></span><span class="ms-1">Price Per Day</span>
                                                         </div>
                                                         <select class="form-control" name="price">
                                                            <?php
                                                            if(isset($_GET['car_id'])){
                                                                echo '<option value="'.$data['price_per_day'].'" selected>'.$data['price_per_day'].'</option>';
                                                            }else{
                                                                echo '<option>-</option>';
                                                            }
                                                            ?>
                                                         </select>
                                                     </div>
                                                 </div>
                                                 <div class="col-12">
                                                     <button class="btn btn-light w-100 py-2" name="bookBtn">Book Now</button>
                                                 </div>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                                 <div class="col-lg-6 d-none d-lg-flex fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                     <div class="text-start">
                                         <h1 class="display-5 text-white">Get 15% off your rental Plan your trip now</h1>
                                         <p>Treat yourself in USA</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Carousel End -->

     <!-- Adding to database -->
     <?php
        if (isset($_POST['bookBtn'])) {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $price = $_POST['price'];

            // Days calculation Function
            $startDate =  new DateTime($start_date);
            $endDate =  new DateTime($end_date);
            $interval = $startDate->diff($endDate);
            $totalDays =  $interval->days;
            $total_price = $price * $totalDays;

            $qf = mysqli_query($conn, "INSERT INTO `bookings`(`user_id`, `car_id`, `start_date`, `end_date`, `total_price`) VALUES('$userId', '$car_id', '$start_date', '$end_date', '$total_price')");

            if ($qf == 1) {
                echo '<script>
                window.location.assign("trackBooking.php?msg=Booking request has been sent!");
            </script>';
                exit();
            } else {
                echo '<div class="alert alert-danager" role="alert">Failed to book car!</div>';
            }
        }
        ?>

     <!-- Footer -->
 <?php
        include("footer.php");
    }
    ?>