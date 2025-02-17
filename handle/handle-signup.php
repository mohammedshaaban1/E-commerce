<?php
require_once "../inc/connection.php";
if (isset($_POST['s-submit'])) {
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $Phone = trim(htmlspecialchars($_POST['Phone']));
    $address = trim(htmlspecialchars($_POST['address']));
    $errors = [];
    if (empty($name)) {
        $errors[] = "Please enter your name";
    } elseif (is_numeric($name)) {
        $errors[] = "Your name must be real";
    } elseif (strlen($name) < 3) {
        $errors[] = "Your name must be more than 3 chars";
    }
    if (empty($email)) {
        $errors[] = "Please enter your email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Your email is wrong";
    }
    if (empty($password)) {
        $errors[] = "Please enter your password";
    } elseif (strlen($password) < 6) {
        $errors[] = "Your password must be more than 6 chars";
    }
    $newPassword = password_hash($password, PASSWORD_DEFAULT);
    if (empty($Phone)) {
        $errors[] = "Please enter your phone";
    } elseif (strlen($Phone) < 5) {
        $errors[] = "Your phone must be more than 5 number";
    } elseif (!is_numeric($Phone)) {
        $errors[] = "Your phone is wrong";
    }
    if (empty($address)) {
        $errors[] = "Please enter your address";
    } elseif (strlen($address) > 255) {
        $errors[] = "Your address must be less than 255 chars";
    }
    if (empty($errors)) {
        $query = "INSERT INTO `users`( `name`, `email`, `password`, `phone`, `address`) VALUES ('$name','$email','$newPassword','$Phone','$address')";
        $runQuery = mysqli_query($con, $query);
        if ($runQuery) {
            $_SESSION['success'] = "Data has been recorded";
            $_SESSION['s_email'] = $email;
            header("location: ../login.php");
            exit;
        } else {
            $_SESSION['errors'] = $errors;
            header("location: ../signup.php");
            exit;
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location: ../signup.php");
        exit;
    }
} else {
    header("location: ../signup.php");
    exit;
}
