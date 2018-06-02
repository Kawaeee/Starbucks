<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include('connection.php');

$itemid =$_GET["mID"];
$add = "INSERT INTO `mer_order`(`order_id`, `user_id`, `item_id`, `amount`) VALUES (1,1,$itemid,1)";
$query = mysqli_query($conn,$add);

header("location: cart.php");
exit();
?>

