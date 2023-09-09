<?php 
include 'db_connection.php';
session_start();
$fid = $_SESSION['fid'];
$uid = $_SESSION['user'];
unset($_SESSION['fid']);
$query = "DELETE FROM `food_details` WHERE fid = '$fid'";
$result = mysqli_query($connection,$query);
if($result){

    $query2 = "SELECT uid,rating FROM `user_details` WHERE uid = '$uid'";
    $result2 = mysqli_query($connection,$query2);
    if ($count = mysqli_num_rows($result2) > 0) {
        $r = mysqli_fetch_assoc($result2);
        $rating =$r['rating'];
        $rating++;
        $query3 = "UPDATE `user_details` SET `rating`='$rating' WHERE uid = '$uid'";
        $result3 = mysqli_query($connection,$query3);
    }
    header('location:selectRole.php');

}
?>