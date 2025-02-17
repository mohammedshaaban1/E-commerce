<?php
require_once "../../../inc/connection.php";

if (isset($_POST['addProduct'])) {
    extract($_POST);
    // Title
    if (empty($title)) {
        $errors[] = "Please Enter a Title";
    } elseif (strlen($title) < 1) {
        $errors[] = "The Title Must Be More";
    } elseif (strlen($title) > 100) {
        $errors[] = "The Title Must Be Less";
    }
    // Description
    if (empty($desc)) {
        $errors[] = "Please Enter a Description";
    } elseif (strlen($desc) < 1) {
        $errors[] = "The Description Must Be More";
    } elseif (strlen($desc) > 255) {
        $errors[] = "The Description Must Be Less";
    }
    // Price
    if (empty($price)) {
        $errors[] = "Please Enter a price";
    }
    // Quantity
    if (empty($quantity)) {
        $errors[] = "Please Enter a Quantity";
    }
    // Image
    $image = $_FILES["img"];
    $imageName = $image["name"];
    $ext = pathinfo($imageName, PATHINFO_EXTENSION);
    $random = uniqid();
    $tmp_name = $image["tmp_name"];
    $newName = "$random.$ext";
    if (empty($errors)) {
        // يجب اضافه cat = 1 
        $query = "INSERT INTO `products`(`name`, `price`, `desc`, `image`, `quantity`,`category_id`) VALUES ('$title','$price','$desc','$newName','$quantity',$cat)";
        $runQuery = mysqli_query($con, $query);
        if ($runQuery) {
            move_uploaded_file($tmp_name, "../../upload/$newName");
            $_SESSION['success'] = "The product has been added";
            header("location: ../addProduct.php");
            exit;
        } else {
            $_SESSION['errors'] = ["Your product is wrong"];
            header("location: ../addProduct.php");
            exit;
        }
    } else {
        $_SESSION['errors'] = ["Your product is wrong"];
        header("location: ../addProduct.php");
        exit;
    }
} else {
    header("location: ../addProduct.php");
    exit;
}
