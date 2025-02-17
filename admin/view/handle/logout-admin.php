<?php
require_once "../../../inc/connection.php";
unset($_SESSION['email_admin']);
header("location:../../../index.php");
exit;
