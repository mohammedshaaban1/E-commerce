<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['email_admin']);
// unset($_SESSION['product']);
header("location:../index.php");
exit;
