<!-- Header and Connection file -->
<?php
include("header.php");
include("config.php");

if(isset($_GET['car_id'])){
    $car_id = $_GET['car_id'];
}
?>

<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-4 my-5 card wow fadeInUp" data-wow-delay="0.1s">
                    <?php
                        $r = mysqli_query($conn, "SELECT * FROM `cars` WHERE `id`=$car_id");
                        $r1 = mysqli_query($conn, "SELECT * FROM `bookings` WHERE `user_id`='$userId'");
                        $row = mysqli_fetch_array($r);
                        $row1 = mysqli_fetch_array($r1);
                    ?>
                    <div class="categories-item p-4">
                        <div class="categories-item-inner">
                            <div class="categories-img rounded-top">
                                <img src="img/<?php echo $row['image_url']; ?>" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="categories-content rounded-bottom p-4 text-center">
                                <h4><?php echo $row['brand']." ".$row['title']."(".$row['model'].")"; ?></h4>
                                <div class="categories-review mb-4">
                                    <div class="me-3 text-center"><?php echo "Start Date ".$row1['start_date']; ?></div>
                                    <div class="me-3 text-center"><?php echo "End Date ".$row1['end_date']; ?></div>
                                </div>
                                <div class="row gy-2 gx-0 text-center mb-4">
                                    <div class="col">
                                        <?php echo "Total Cost - $".$row1['total_price']; ?>
                                    </div>
                                </div>
                                <div class="btn btn-primary rounded-pill d-flex justify-content-center py-3"><?php echo "Request Status: ".$row1['status']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>

<!-- Footer -->
<?php
include("footer.php");
?>