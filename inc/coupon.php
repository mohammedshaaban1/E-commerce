<?php
require_once "connection.php";
if (isset($_POST['check'])) {
    $coupon = trim(htmlspecialchars($_POST['cop']));
    $query = "SELECT * FROM `coupon` WHERE coupon = $coupon";
    $runQuery = mysqli_query($con, $query);
    if (mysqli_num_rows($runQuery) == 1) {
        $cop = mysqli_fetch_assoc($runQuery);
        $c = $cop['coupon'];
        $discount = $cop['Discount'];
        if ($c == $coupon) {
            $quer = "DELETE FROM `coupon` WHERE coupon = $coupon";
            $run = mysqli_query($con, $quer);
            $_SESSION['success'] = "The discount has been added";
            $_SESSION['discount'] = $discount;
            header("location:../cart.php");
            exit;
        } else {
            $_SESSION['errors'] = ["The coupon could not be found"];
            header("location:../cart.php");
            exit;
        }
    } else {
        $_SESSION['errors'] = ["The coupon could not be found"];
        header("location:../cart.php");
        exit;
    }
} else {
    header("location:../cart.php");
    exit;
}
