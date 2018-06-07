<?php
error_reporting(0);
session_start();
include('connection.php');

$id = $_SESSION['id'];

if($id == null){
    echo "<script>alert('We need you to login before buying. Try again !!')</script>";
    echo "<script>window.location='./login.php';</script>";
} else {

$itemid =$_GET["mID"];

$query = "INSERT INTO `mer_order`(`id`,`sep_order`,`order_id`, `user_id`, `item_id`, `amount`,`status`) VALUES (null,1,1,?,?,1,1)";
$prequery = $conn->prepare($query);
$prequery->bind_param("ii",$id,$itemid);
$prequery->execute();

echo "<script>window.location='./cart.php';</script>";
}
exit();
?>

