<?php
include("config.php");

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$query1 = "SELECT * FROM `admin`";
$result1 = mysqli_query($conn, $query1);

while($row1 = mysqli_fetch_assoc($result1)){
    if($email == $row1['email'] && $pwd == $row1['password']){
        echo "<script>window.location.assign('adminIndex.php');</script>";
        exit();
    }
    else{
        echo "<script>window.location.assign('login.php?msg=Wrong Credentials!');</script>";
        exit();
    }
}
?>