<?php
include "config.php";
session_start();
if($_SESSION["admin"]){
    if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["type"] == "user"){
        $uid = $_GET["uid"];
        $sql = "DELETE FROM `users` WHERE `user_id` = '$uid'";
        if ($conn->query($sql) === TRUE) {
        header("location:viewcustomers.php");
        }else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["type"] == "channel"){
        $cid = $_GET["cid"];
        $query = "DELETE FROM `all_channels` WHERE `channel_id` = '$cid'";
        if ($conn->query($query) === TRUE) {
            header("location:allchannels.php");
            }else {
                echo "Error deleting record: " . $conn->error;
            }
    }

    if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["type"] == "packs"){
        $pid = $_GET["pid"];
        $query1 = "DELETE FROM `packs` WHERE `pack_id` = '$pid'";
        if ($conn->query($query1) === TRUE) {
            header("location:dashboard.php"); 
            }else {
                echo "Error deleting record: " . $conn->error;
            }
    }

}
?>
