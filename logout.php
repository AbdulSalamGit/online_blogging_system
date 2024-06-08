<?php
session_start();

session_unset();

session_destroy();

$_SESSION['user'] = "Logout successfully";

header("location:index.php");
?>
