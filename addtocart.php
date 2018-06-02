<?php
error_reporting(0);
session_start();
include('connection.php');

$id = $_SESSION['id'];
if($id == null){
    echo "<script>alert('We need you to access this from login site. Try again !!')</script>";
    echo "<script>window.location='./login.php';</script>";
}else{

$itemid =$_GET["mID"];
$add = "INSERT INTO `mer_order`(`order_id`, `user_id`, `item_id`, `amount`) VALUES (1,$id,$itemid,1)";
$query = mysqli_query($conn,$add);
echo "<script>window.location='./cart.php';</script>";
}
//header("location: ./cart.php");
exit();
?>

