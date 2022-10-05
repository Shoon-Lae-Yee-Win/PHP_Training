<?php
include "db.php";
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $amount = $_POST['amount'];
    $month = $_POST['month'];
    $user_data = 'name=' . $name . '&email=' . $email . '&address=' . $address . '&number=' . $number . '&amount=' . $amount . '&month' . $month;
    if (empty($name) || $name == "" || $email == "" || $address == "" || $number == "" || $amount == "" || $month == "") {
        header("location:register.php?$user_data");
    } else {
        echo 'name is not empty';
        $sql = "INSERT INTO users (name,email,address,number,amount,month) VALUES (?,?,?,?,?,?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            $param_name = $name;
            $param_email = $email;
            $param_address = $address;
            $param_number = $number;
            $param_amount = $amount;
            $param_month = $month;
            mysqli_stmt_bind_param($stmt, "ssssis", $param_name, $param_email, $param_address, $param_number, $param_amount, $param_month);
            if (mysqli_stmt_execute($stmt)) {
                echo "SUCCESS";
                header("location:index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
}
