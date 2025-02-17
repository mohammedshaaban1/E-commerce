<?php
require_once "../inc/connection.php";
if (isset($_POST['Confirm'])) {
    if (isset($_SESSION['carts'])) {
        $carts = $_SESSION['carts'];


        foreach ($carts as $cart) {
            // $product_id= $cart['product_id '];
            // $quant= $cart['quant '];
            // $subTot= $cart['subTot '];
            // $user_id= $cart['user_id '];
            // $query="INSERT INTO `ordersdetails`(`product_id`, `quan`, `subTotal`, `user_id`) VALUES ('$product_id','$quant','$subTot','$user_id')";
            // $runQuery = mysqli_query($con,$query);


        }
    } else {
    }
} else {
    header("location:../cart.php");
    exit;
}
