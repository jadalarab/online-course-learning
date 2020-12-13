<?php
extract($_POST);
session_start();
$_SESSION['name'] = $name;
$_SESSION['role'] = $role;
header("Location:admin.php");
?>