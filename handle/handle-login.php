<?php
require_once "../inc/connection.php";
if (isset($_POST['l-submit'])) {
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $errors = [];
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
    if (empty($errors)) {
        $query = "SELECT * FROM `users` WHERE email='$email'";
        $runQuery = mysqli_query($con, $query);
        if (mysqli_num_rows($runQuery) == 1) {
            $user = mysqli_fetch_assoc($runQuery);
            $oldpassword = $user['password'];
            $is_true = password_verify($password, $oldpassword);
            if ($is_true) {
                if ($user['role'] == "admin") {
                    $_SESSION['email_admin'] = $email;
                    header("location:../admin/view/layout.php");
                    exit;
                } else {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['success'] = "welcome" . " " . $user['name'];
                    header("location: ../index.php");
                    exit;
                }
            } else {
                $_SESSION['errors'] = ["Your email or password is wrong"];
                header("location: ../login.php");
                exit;
            }
        } else {
            $_SESSION['errors'] = ["Your email or password is wrong"];
            header("location: ../login.php");
            exit;
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location: ../login.php");
        exit;
    }
} else {
    header("location: ../login.php");
    exit;
}
