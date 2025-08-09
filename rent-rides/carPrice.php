<?php
if(isset($_GET['carId'])){
    include("config.php");
    $carId = $_GET['carId'];

    $query = mysqli_query($conn, "SELECT `price_per_day` FROM `cars` WHERE `id`='$carId'");
    
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_array($query);
        echo $row['price_per_day'];
    }
}

?>