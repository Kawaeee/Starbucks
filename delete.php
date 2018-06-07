<?php
session_start();
include('connection.php');

$id = $_SESSION['id'];
$mID= $_GET["mID"];

$query = "DELETE FROM `mer_order` WHERE item_id = ? AND user_id = ? LIMIT 1";
$prequery = $conn->prepare($query);
$prequery->bind_param("ii",$mID,$id);
$prequery->execute();

header("location: cart.php");

exit();
?>

