<?php
session_start();
$user = $_POST['user'];
$password = $_POST['password'];

if ($user == 'username' and $password == '123456') {
    $_SESSION['user'] = ["user" => "username"];
    header("location:home.php");
} else {
    header("location:index.php?error=1");
}

