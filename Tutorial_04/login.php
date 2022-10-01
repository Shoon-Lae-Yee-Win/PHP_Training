<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location: home.php');
    exit();
}
define("USER", "username");
define("PASSWORD", "123456");
session_start();
$user = $_POST['user'];
$password = $_POST['password'];
// Check username and password 
if ($user == USER and $password == PASSWORD) {
    $_SESSION['user'] = ["user" => "username"];
    header("location:home.php");
} else {
    header("location:index.php?error=1");
}
