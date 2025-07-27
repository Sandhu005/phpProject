<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");
?>

<!-- Fetching database -->
<?php
if (isset($_GET['catId'])) {
    $catId = $_GET['catId'];
    $query = mysqli_query($conn, "SELECT `name`, `description`, `status` FROM `catagories` WHERE `id`='$catId'");
    $row = mysqli_fetch_array($query);
}
?>

<!-- Form Start -->
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-secondary p-5 rounded">
                <h4 class="text-primary mb-4">Fill Details to Add Catagory</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row g-4">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Catagory Name" required value="<?php echo $row['name']; ?>">
                                <label for="name">Catagory Name</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" required value="<?php echo $row['description']; ?>">
                                <label for="description">Enter Description</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="file" class="form-control" name="img" id="img" required>
                                <label for="img">Upload Image</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <select class="form-control" name="status" id="status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">inactive</option>
                                </select>
                                <label for="status">Select Status</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-light w-50 py-3" name="addBtn">Update Catagory</button>
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
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $img = $_FILES['img'];
    $imgTmp = $img['tmp_name'];
    $imgName = $img['name'];
    $img_url = rand() . "-" . $imgName;

    $query = "UPDATE `catagories` SET `name`='$name', `description`='$description', `img_url`='$img_url', `status`='$status' WHERE `id`='$catId'";
    $result = mysqli_query($conn, $query);

    if ($result == 1) {
        move_uploaded_file($imgTmp, "img/" . $img_url);
        echo '<script>window.location.assign("manageCatagory.php?msg=Catagory Updated Successfully!");</script>';
        exit();
    } else {
        echo '<script>window.location.assign("manageCatagory.php?msg=Catagory Updated Successfully!");</script>';
        exit();
    }
}

?>

<!-- Footer -->
<?php
include("adminFooter.php");
?>