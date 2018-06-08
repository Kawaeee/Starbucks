<?php
error_reporting(0);
session_start();
include('connection.php');

$id = $_SESSION['id'];
if($id == null){
    echo "<script>alert('We need you to access this from login site. Try again !!')</script>";
    echo "<script>window.location='./login.php';</script>";
} else {
$fn = $_POST["fullname"];
$em = $_POST["email"];
$ad = $_POST["address"];
$ci = $_POST["city"];
$st = $_POST["state"];
$zp = $_POST["zip"];
$sep = $_POST["sep_order"];

$_SESSION['sep_order'] = $sep;

$check = "SELECT * FROM `mer_data` WHERE id = ? LIMIT 1";
$checkquery = $conn->prepare($check);
$checkquery->bind_param("i",$id);
$checkquery->execute();
$checkre  = $checkquery->get_result();
$checkres = $checkre->fetch_array();

$order = "SELECT * FROM `mer_order` WHERE user_id = ? ORDER BY order_id DESC LIMIT 1";
$orderquery = $conn->prepare($order);
$orderquery->bind_param("i",$id);
$orderquery->execute();
$orderre = $orderquery->get_result();
$orderres = $orderre->fetch_array();

$order_id = $orderres["order_id"];
$neworder_id = $orderres["order_id"]+1;

if($checkre->num_rows >= 1){
    $update = "UPDATE `mer_data` SET `fullname`= ? ,`email`= ? ,`address`= ? ,`city`= ? ,`state`= ? ,`zip`= ? WHERE id = ? ";
    $updatequery = $conn->prepare($update);
    $updatequery->bind_param("sssssii",$fn,$em,$ad,$ci,$st,$zp,$id);
    $updatequery->execute();

    $item = "UPDATE `mer_order` SET `status`= 2,`sep_order`= ?,`order_id`= ? WHERE user_id = ? AND order_id = 1";
    $itemquery = $conn->prepare($item);
    $itemquery->bind_param("iii",$sep,$neworder_id,$id);
    $itemquery->execute();
}
else{
    $add = "INSERT INTO `mer_data`(`data_id`, `id`, `fullname`, `email`, `address`, `city`, `state`, `zip`) VALUES (null,?,?,?,?,?,?,?)";
    $addquery = $conn->prepare($add);
    $addquery->bind_param("isssssi",$id,$fn,$em,$ad,$ci,$st,$zp);
    $addquery->execute();

    $item = "UPDATE `mer_order` SET `status`= 2,`sep_order`= ?,`order_id`= ? WHERE user_id = ? AND order_id = 1";
    $itemquery = $conn->prepare($item);
    $itemquery->bind_param("iii",$sep,$neworder_id,$id);
    $itemquery->execute();
}
    echo "<script>alert('Checkout complete !!')</script>";
    echo "<script>window.location='./reciept.php';</script>";
}
exit();
?>

