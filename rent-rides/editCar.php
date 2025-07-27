<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");

$id = $_GET['id'];
$q = "SELECT `title`, `brand`, `model`, `price_per_day`, `image_url`, `description` FROM `cars` WHERE `id` = '$id'";
$r = mysqli_query($conn, $q);
$d = mysqli_fetch_assoc($r);
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
                                <select name="cat_id" id="" class="form-control" required>
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
                                <input type="text" class="form-control" name="title" id="title" placeholder="Car Title" value="<?php echo $d['title']; ?>" required>
                                <label for="title">Car Title</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="brand" id="brand" placeholder="Car Brand" value="<?php echo $d['brand']; ?>" required>
                                <label for="brand">Car Brand</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="model" id="model" placeholder="Car Model" value="<?php echo $d['model']; ?>" required>
                                <label for="model">Car Model</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="price_per_day" id="price_per_day" placeholder="Price Per Day" value="<?php echo $d['price_per_day']; ?>" required>
                                <label for="price_per_day">Price Per Day</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" value="<?php echo $d['description']; ?>" required>
                                <label for="description">Enter Description</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="file" class="form-control" name="img" id="img" required>
                                <label for="img">Upload Car Image</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-light w-50 py-3" name="addBtn">Update Car</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Updating to database -->
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


    $query = "UPDATE `cars` SET `cat_id`='$cat_id',`title`='$title',`brand`='$brand',`model`='$model',`price_per_day`='$price_per_day',`image_url`='$image_url',`description`='$description' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result == 1) {
        echo '<script>
                window.location.assign("manageCars.php?msg=Car Updated Successfully!");
                </script>';
            move_uploaded_file("$imgTmp", "img/".$image_url);
            exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Failed to Update Car!
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