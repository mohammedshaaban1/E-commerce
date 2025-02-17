<?php
require_once 'connection.php';
if (isset($_POST['remove'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM `cart` WHERE id=$id";
    $runQuery = mysqli_query($con, $query);
    if ($runQuery) {
        $_SESSION['del_success'] = "Product has been deleted";
        header("location:../cart.php");
        exit;
    } else {
        $_SESSION['errors'] = ["Product not found"];
        header("location:../shop.php");
        exit;
    }
} else {
    header("location:../cart.php");
    exit;
}
