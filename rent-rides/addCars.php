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
                <h4 class="text-primary mb-4">Fill Details to Add Car</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row g-2">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <select name="cat_id" id="" class="form-control">
                                    <option value="" selected disabled>Select Catagory</option>
                                    <?php
                                        $data = mysqli_query($conn, "SELECT * FROM `catagories`");
                                        while($row = mysqli_fetch_assoc($data)){
                                            echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Car Title">
                                <label for="title">Car Title</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="brand" id="brand" placeholder="Car Brand">
                                <label for="brand">Car Brand</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="model" id="model" placeholder="Car Model">
                                <label for="model">Car Model</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="price_per_day" id="price_per_day" placeholder="Price Per Day">
                                <label for="price_per_day">Price Per Day</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
                                <label for="description">Enter Description</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="file" class="form-control" name="img" id="img">
                                <label for="img">Upload Car Image</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-light w-50 py-3" name="addBtn">Add Car</button>
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
    $cat_id = $_POST['cat_id'];
    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price_per_day = $_POST['price_per_day'];
    $description = $_POST['description'];

    $img = $_FILES['img'];
    $imgTmp = $img['tmp_name'];
    $imgName = $img['name'];
    $image_url = rand()."-".$imgName;


    $query = "INSERT INTO `cars`(`cat_id`, `title`, `brand`, `model`, `price_per_day`, `image_url`, `description`) VALUES ('$cat_id', '$title', '$brand', '$model', '$price_per_day', '$image_url', '$description')";
    $result = mysqli_query($conn, $query);

    if ($result == 1) {
        echo '<div class="alert alert-success" role="alert">
                Car Added Successfully!
            </div>';
            move_uploaded_file("$imgTmp", "img/".$image_url);
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Failed to Add Car!
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