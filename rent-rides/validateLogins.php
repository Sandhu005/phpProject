<?php
include("config.php");

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$query1 = "SELECT * FROM `admin`";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_array($result1);

$query2 = "SELECT * FROM `users`";
$result2 = mysqli_query($conn, $query2);

while($row2 = mysqli_fetch_assoc($result2)){
            if($email == $row2['email'] && $pwd == $row2['password']){
                $flag = 1;
                $id = $row2['id'];
            }
}

if ($email == $row1['email'] && $pwd == $row1['password']) {
    echo "<script>window.location.assign('adminIndex.php');</script>";
    exit();
} 
elseif($flag==1){
    echo "<script>window.location.assign('index.php?id=".$id."');</script>";
    exit();
}
else {
    echo "<script>window.location.assign('login.php?msg=Wrong Credentials!');</script>";
    exit();
}

?>