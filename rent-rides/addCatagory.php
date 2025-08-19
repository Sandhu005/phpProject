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
                <?php
                    if(isset($_GET['msg'])){
                        echo '<div class="alert alert-warning" role="alert">'.$_GET['msg'].'</div>';
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row g-4">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Catagory Name" required>
                                <label for="name">Catagory Name</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" required>
                                <label for="description">Enter Description</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="file" class="form-control" name="img" id="img" required>
                                <label for="img">Upload Image</label>
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
    //Senitize User Data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $flag = 0;
    $error = null;

    //Validations
    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $error = "Only letters, spaces are allowed in the title.";
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

        $query = "INSERT INTO `catagories`(`name`, `description`, `img_url`) VALUES ('$name', '$description', '$img')";
        $result = mysqli_query($conn, $query);

        if ($result == 1) {
            echo '<script>
                        window.location.assign("addCatagory.php?msg=Category Added Successfully!");
                </script>';
        } else {
            echo '<script>
                        window.location.assign("addCatagory.php?msg=Failed to Add Category!");
                </script>';
        }
        mysqli_close($conn);
    }else{
        echo '<script>
                    window.location.assign("addCatagory.php?msg='.$error.'");
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