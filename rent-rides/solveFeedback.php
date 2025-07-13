<?php
session_start();
if(!isset($_SESSION['adminId'])){
    echo '<script>window.location.assign("index.php");</script>';
}else{
        include("config.php");
        if(isset($_GET['feedbackId'])){
            $feedbackId = $_GET['feedbackId'];
            
            $query = mysqli_query($conn, "UPDATE `feedbacks` SET `status`='solved' WHERE `id`='$feedbackId'");
            if($query==1){
                header("location: manageFeedbacks.php?msg=Feedback Updated succesfully!");
                exit;
            }else{
                header("location: manageFeedbacks.php?msg=Failed to Update Feedback!");
                exit;
            }
        }
}
?>