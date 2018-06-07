<?php
ini_set('display_errors', 'On');
error_reporting(0);
session_start();
include('connection.php');

$id = $_SESSION['id'];
if($id == null){
    echo "<script>alert('We need you to access this from login site. Try again !!')</script>";
    echo "<script>window.location='./login.php';</script>";
}else{

$fn = $_POST["fullname"];
$em = $_POST["email"];
$ad = $_POST["address"];
$ci = $_POST["city"];
$st = $_POST["state"];
$zp = $_POST["zip"];
$sep = $_POST["sep_order"];

$_SESSION['sep_order'] = $sep;

$check = "SELECT * FROM `mer_data` WHERE id = $id LIMIT 1";
$checkquery  = mysqli_query($conn, $check);
$checkres = mysqli_fetch_array($checkquery,MYSQLI_ASSOC);

$order = "SELECT * FROM `mer_order` WHERE user_id = $id ORDER BY order_id DESC LIMIT 1";
$orderquery = mysqli_query($conn,$order);
$orderres = mysqli_fetch_array($orderquery,MYSQLI_ASSOC);

$order_id = $orderres["order_id"];
$neworder_id = $orderres["order_id"]+1;
//echo $order_id;

$num_rows = mysqli_num_rows($checkquery);

/*if($num_rows==0){
    $start = "INSERT INTO `mer_data`(`data_id`, `id`, `fullname`, `email`, `address`, `city`, `state`, `zip`) VALUES (0,0,0,0,0,0,0,0)";
    $startquery = mysqli_query($conn,$start);
}*/

if($num_rows >= 1){
    $update = "UPDATE `mer_data` SET `fullname`='$fn',`email`='$em',`address`='$ad',`city`='$ci',`state`='$st',`zip`= $zp WHERE id = $id";
    $upquery = mysqli_query($conn,$update);

    $itemst = "UPDATE `mer_order` SET `status`= 2,`sep_order`= $sep,`order_id`= $neworder_id WHERE user_id = $id AND order_id = 1";
    $morequery = mysqli_query($conn,$itemst);
}
else{

    $add = "INSERT INTO `mer_data`(`data_id`, `id`, `fullname`, `email`, `address`, `city`, `state`, `zip`) VALUES (null,$id,'$fn','$em','$ad','$ci','$st',$zp)";
    $addquery = mysqli_query($conn,$add);

    $itemst = "UPDATE `mer_order` SET `status`= 2,`sep_order`= $sep,`order_id`= $neworder_id WHERE user_id = $id AND order_id = 1";
    $morequery = mysqli_query($conn,$itemst);
}
    echo "<script>alert('Checkout complete !!')</script>";
    echo "<script>window.location='./reciept.php';</script>";

}
//header("location: ./cart.php");
exit();
?>

