<?php
require_once '../../../inc/connection.php';
if (isset($_POST['addCategory'])) {

    $title = trim(htmlspecialchars($_POST['title']));
    $errors = [];
    if (empty($title)) {
        $errors[] = "The category is required";
    } elseif (strlen($title) < 3) {
        $errors[] = "The category must be more than 3 chars";
    }
    if (empty($errors)) {
        $checkTitle = "SELECT `title` FROM `categories` WHERE `title` = '$title'";
        $runCheck = mysqli_query($con, $checkTitle);
        $titleDate = mysqli_num_rows($runCheck);
        if ($titleDate > 0) {
            $_SESSION['errors'] = ["Category already exists"];
            header("location: ../addCategory.php");
            exit;
        } else {
            $query = "INSERT INTO `categories`(`title`) VALUES ('$title')";
            $runQuery = mysqli_query($con, $query);
            if ($runQuery) {
                $_SESSION['success'] = "Category added";
                header("location: ../addCategory.php");
                exit;
            } else {
                $_SESSION['errors'] = ["Category is wrong"];
                header("location: ../addCategory.php");
                exit;
            }
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location: ../addCategory.php");
        exit;
    }
} else {
    header("location: ../addCategory.php");
    exit;
}
