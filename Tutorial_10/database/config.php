<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Mysql123@');
define('DB_NAME', 'tutorial');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($link === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

//$sql = "CREATE DATABASE IF NOT EXISTS tutorial";
//$link->query($sql);
//
//$sql = "use tutorial;";
//$link->query($sql);
//
//$sql="CREATE TABLE `tutorial`.`users` (
//        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//        username VARCHAR(50) NOT NULL UNIQUE,
//        password VARCHAR(255) NOT NULL,
//        email VARCHAR(255) NOT NULL,
//        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
//    );";
//$link->query($sql);
//$sql1="CREATE TABLE `tutorial`.`token` (
//    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//    username VARCHAR(50) NOT NULL UNIQUE,
//    token VARCHAR(100) NOT NULL,
//    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
//    );";
//$link->query($sql1);

?>