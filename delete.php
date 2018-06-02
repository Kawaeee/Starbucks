<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include('connection.php');

$mID= $_GET["mID"];
$conn->query("DELETE FROM `mer_order` WHERE item_id = $mID AND user_id = 1");

header("location: cart.php");
exit();
?>

