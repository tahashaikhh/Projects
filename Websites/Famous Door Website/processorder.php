<?php
session_start();
include 'conn.php';
$name = $_POST['name'];
$mobile = $_POST['mobile_no'];
$address = $_POST['address'];
$total_price = $_POST['total_price'];
$status = "pending";

if(isset($_POST['name'])){
    
$query = $mysqli->prepare("INSERT INTO `transaction`(`c_name`, `mobile_no`, `address`, `amount`, `status`) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("sssss",$name, $mobile, $address, $total_price, $status);
$result = $query->execute();
$query->close();   
$query2 = $mysqli->prepare("INSERT INTO `transaction_product_details`(`tid`, `pid`, `quantity`, `size`) VALUES (?,?,?,?)");
$last_id = $mysqli->insert_id;
foreach($_SESSION["shopping_cart"] as $p){
    $pid = $p['pid'];
    $quan = $p['quantity'];
    $size = $p['size'];
    $query2->bind_param("iiii",$last_id, $pid, $quan, $size);
    $result2 = $query2->execute();
}
if($result && $result2){
    session_destroy();
    header('location:thankyou.php');
    setcookie("Ordersuccessful", 1, time()+5);
}else{
    header('location:order.php');
}
$query2->close();
mysqli_close($conn);
}



?>