<?php
error_reporting(E_ALL);
session_start();
include('connection.php');

$id = $_SESSION['id'];
$mID= $_GET["mID"];
$conn->query("DELETE FROM `mer_order` WHERE item_id = $mID AND user_id = $id");

header("location: cart.php");
exit();
?>

