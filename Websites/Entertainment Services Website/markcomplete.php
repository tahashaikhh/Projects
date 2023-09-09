<?php
include "config.php";
session_start();
if($_SESSION["admin"]){
    if($_SERVER["REQUEST_METHOD"] == "GET")
    $rid = $conn -> real_escape_string($_GET["rid"]);
    $sql = "UPDATE `recharge_details` SET `status`='complete' WHERE `recharge_id` =  $rid";
    if ($conn->query($sql) === TRUE) {
        header('location:dashboard.php');
      } else {
        echo "Please Try Again";
        echo "Error updating record: " . $conn->error;
      }
}
?>
