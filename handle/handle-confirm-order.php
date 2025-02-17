<?php
require_once "../inc/connection.php";
if (isset($_SESSION['user_id'])) {
    if (isset($_POST['save'])) {
        $name = trim(htmlspecialchars($_POST['name']));
        $email = trim(htmlspecialchars($_POST['email']));
        $address = trim(htmlspecialchars($_POST['address']));
        $phone = trim(htmlspecialchars($_POST['phone']));
        $city = trim(htmlspecialchars($_POST['city']));
        $paymentType = trim(htmlspecialchars($_POST['paymentType']));
        $id = $_SESSION['user_id'];
        $query = "INSERT INTO `confirmorders`( `name`, `email`, `phone`, `address`, `city`, `paymentType`, `user_id`) VALUES ('$name','$email','$phone','$address','$city','$paymentType','$id')";
        $runQuery = mysqli_query($con, $query);
        if ($runQuery) {
            $_SESSION['success'] = "The order has been received successfully";
            $query = "DELETE FROM `cart` WHERE user_id='$id'";
            $runQuery = mysqli_query($con, $query);
            header("location: ../login.php");
            exit;
        } else {
            $_SESSION['errors'] = ["The order is wrong"];
            header("location: ../login.php");
            exit;
        }
    } else {
        header("location:../confirmOrder.php");
        exit;
    }
} else {
    header("location:../index.php");
    exit;
}
