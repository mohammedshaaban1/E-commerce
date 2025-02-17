<?php
require_once "../inc/connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['quantity'])) {
        $id = trim(htmlspecialchars($_POST['id']));
        $quantity = trim(htmlspecialchars($_POST['quantity']));
        $query = "SELECT * FROM `products` WHERE id = $id";
        $runQuery = mysqli_query($con, $query);
        if (mysqli_num_rows($runQuery) == 1) {
            $product = mysqli_fetch_assoc($runQuery);
            $image = $product['image'];
            $name = $product['name'];
            $desc = $product['description'];
            $quan = $quantity;
            $price = $product['price'];
            $subTotal = ($price * $quantity);
            $user_id = $_SESSION['user_id'];
            $queryIns = "INSERT INTO `cart`(`image`, `name`, `desc`, `quan`, `price`, `subTotal`, `user_id`) VALUES ('$image','$name','$desc','$quan','$price','$subTotal','$user_id')";
            $runQ = mysqli_query($con, $queryIns);
            if ($runQ) {
                $_SESSION['success'] = "Product has been added to cart";
                header("location:../shop.php");
                exit;
            } else {
                $_SESSION['errors'] = ["Product not found"];
                header("location:../shop.php");
                exit;
            }
        } else {
            $_SESSION['errors'] = ["Product not found"];
            header("location:../shop.php");
            exit;
        }
    } else {
        header("location:../shop.php");
        exit;
    }
} else {
    header("location:../shop.php");
    exit;
}
