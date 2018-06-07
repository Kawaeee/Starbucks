<?php
error_reporting(0);
session_start();
include("connection.php");

$username = $_POST["usr"];
$password = $_POST["pwd"];

if($username == null or $password == null){
    echo "<script>alert('We need you to access this from login site. Try again !!')</script>";
    echo "<script>window.location='./login.php';</script>";
}

$strSQL = "SELECT * FROM mer_user WHERE username = ? AND password = ?";
$prequery = $conn->prepare($strSQL);
$prequery->bind_param("ss",$username,$password);
$prequery->execute();
$result = $prequery->get_result();
$objResult = $result->fetch_array();


if (!$objResult) {
    echo "<script>alert('Your username or password are incorrect. Try again !!')</script>";
    echo "<script>window.location='./login.php';</script>";
} else {
    $_SESSION["id"]     = $objResult["id"];
    session_write_close();
    echo "<script>alert('Login Successful !!')</script>";
    echo "<script>window.location='./index.php';</script>";
}
mysqli_close($conn);
exit();
?>