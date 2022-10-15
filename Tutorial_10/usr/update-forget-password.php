<?php
if (isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['username']) {
    require_once('../database/config.php');
    $username = $_POST['username'];
    $token = $_POST['reset_link_token'];
    $password = $_POST['password'];
    if (deleteToken($link, $username)) {
        $query = mysqli_query($link, "SELECT * FROM `users` WHERE `username`='" . $username . "'");
        $row = mysqli_num_rows($query);
        if ($row) {
            $q =  mysqli_query($link, "UPDATE users set password='" . $password . "' WHERE username='" . $username . "'");
            if ($q) {
                echo '<p>Congratulations! Your password has been updated successfully.</p>';
                echo '<a href="login.php">Login Page</a>';
            } else {
                echo 'Update Password Error!';
            }
        } else {
            echo "<p>Something goes wrong. Please try again</p>";
        }
    }
}
//Delete token function
function deleteToken($link, $username)
{
    $sql = "DELETE FROM token WHERE username = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            return false;
        }
    }
}
