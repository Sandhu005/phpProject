<!-- Connection file and session start -->
<?php
session_start();
include("config.php");
?>

<!-- Session condition -->
<?php
if(!isset($_SESSION['adminId'])){
    header("location: index.php");
    exit();
}
?>

<!-- Deletion Query -->
<?php

if(isset($_GET['catId'])){
    $catId = $_GET['catId'];
    $query = mysqli_query($conn, "UPDATE `catagories` SET `status`='inactive' WHERE `id`='$catId'");

    if($query==1){
        header("location: manageCatagory.php?msg=Catagory Deleted Successfully!");
        exit();
    }else{
        header("location: manageCatagory.php?msg=Failed to Delete Catagory!");
        exit();
    }
}
?>