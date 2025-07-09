<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");
?>

<!-- Form Start -->
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-secondary p-5 rounded">
                <h4 class="text-primary mb-4">Fill Details to Add Catagory</h4>
                <form action="" method="post">
                    <div class="row g-4">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Catagory Name">
                                <label for="name">Catagory Name</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
                                <label for="description">Enter Description</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-light w-50 py-3" name="addBtn">Add Catagory</button>
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
    $description = $_POST['description'];

    $query = "INSERT INTO `catagories`(`name`, `description`) VALUES ('$name', '$description')";
    $result = mysqli_query($conn, $query);

    if ($result == 1) {
        echo '<div class="alert alert-success" role="alert">
                Catagory Added Successfully!
            </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Failed to Add Catagory!
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
include("adminFooter.php");
?>