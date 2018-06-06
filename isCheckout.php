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

$check = mysqli_query("SELECT * FROM `mer_data` WHERE id = $id");
$checkquery  = mysqli_query($conn, $check);
$checkres = mysqli_fetch_array($checkquery,MYSQLI_ASSOC);

if($num_rows = mysqli_num_rows($checkquery) == 1){
    $updata = "UPDATE `mer_data` SET `fullname`='$fn',`email`='$em',`address`='$ad',`city`='$ci',`state`='$st',`zip`= $zp WHERE id = $id";
    $query = mysqli_query($conn,$updata);

    $itemst = "UPDATE `mer_order` SET `status`= 2 WHERE order_id = $id";
    $morequery = mysqli_query($conn,$itemst);
}
else{

    $adddata = "INSERT INTO `mer_data`(`data_id`, `id`, `fullname`, `email`, `address`, `city`, `state`, `zip`) VALUES (null,$id,'$fn','$em','$ad','$ci','$st',$zp)";
    $query = mysqli_query($conn,$adddata);

    $itemst = "UPDATE `mer_order` SET `status`= 2 WHERE order_id = $id";
    $morequery = mysqli_query($conn,$itemst);
}
    echo "<script>alert('Checkout complete !!')</script>";
    echo "<script>window.location='./reciept.php';</script>";

}
//header("location: ./cart.php");
exit();
?>

