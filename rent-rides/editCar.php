<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");

$carId = $_GET['carId'];
$q = "SELECT `title`, `brand`, `model`, `price_per_day`, `image_url`, `description` FROM `cars` WHERE `id` = '$carId'";
$r = mysqli_query($conn, $q);
$d = mysqli_fetch_assoc($r);
?>

<!-- Form Start -->
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-secondary p-5 rounded">
                <h4 class="text-primary mb-4">Fill Details to Add Car</h4>
                <?php
                    if(isset($_GET['msg'])){
                        echo '<div class="alert alert-danger" role="alert">'.$_GET['msg'].'</div>';
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row g-2">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <select name="cat_id" id="" class="form-control" required>
                                    <option value="" selected disabled>Select Catagory</option>
                                    <?php
                                    $data = mysqli_query($conn, "SELECT * FROM `catagories`");
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
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

    //Senitize User Data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $brand = filter_var($_POST['brand'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $model = preg_replace('/[^0-9]/', '', $_POST['model']);
    $price = preg_replace('/[^0-9]/', '', $_POST['price_per_day']);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cat_id = $_POST['cat_id'];
    $flag = 0;
    $error = null;

    //Validations
    if (!preg_match("/^[a-zA-Z\s]*$/", $title)) {
        $error = "Only letters, spaces are allowed in the title.";
        $flag = 1;
    }

    if (!preg_match("/^[a-zA-Z\s]*$/", $brand)) {
        $error = "Only letters, spaces are allowed in the brand.";
        $flag = 1;
    }

    if (!preg_match("/^[0-9]{4}$/", $model)) {
        $error = "Invalid model year.";
        $flag = 1;
    }

    if (!preg_match("/^[0-9]{3}$/", $price)) {
        $error = "Invalid price amount.";
        $flag = 1;
    }

    if (!preg_match("/^[a-zA-Z\s,'-]*$/", $description)) {
        $error = "Invalid characters in description!";
        $flag = 1;
    }

    if (!empty($_FILES['img']['tmp_name'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpeg'];
        $maxSize = 2 * 1024 * 1024; // 2MB max

        $fileTmpPath = $_FILES['img']['tmp_name'];
        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];

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
            $img = uniqid() . '-' . $fileName;
            $destPath = 'img/' . $img;

            if (!move_uploaded_file($fileTmpPath, $destPath)) {
                $error = "Failed to upload profile picture.";
                $flag = 1;
            }
        }
    }

    if (!$flag == 1) {
        $query = "UPDATE `cars` SET `cat_id`='$cat_id',`title`='$title',`brand`='$brand',`model`='$model',`price_per_day`='$price_per_day',`image_url`='$image_url',`description`='$description' WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);

        if ($result == 1) {
            echo '<script>
                window.location.assign("manageCars.php?msg=Car Updated Successfully!");
                </script>';
            exit();
        } else {
            echo '<script>
                window.location.assign("editCars.php?msg=Failed to Update Car!");
                </script>';
        }
    }else{
        echo '<script>
                window.location.assign("editCars.php?msg='.$error.'");
            </script>';
    }
}

?>

<!-- Preventing from resubmission -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<!-- Footer -->
<?php
include("adminFooter.php");
?>