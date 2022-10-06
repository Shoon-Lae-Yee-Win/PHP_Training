<?php
require_once("../database/config.php");
$sql = "SELECT * from student";
$result = mysqli_query($link, $sql);

//create an array
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}

echo json_encode($emparray);
