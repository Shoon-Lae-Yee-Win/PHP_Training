<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../index.php");
    exit;
}
require_once "../database/config.php";
$email = "";
$email_err = "";

// insert token value to database, check later to confirm user
function insert_token($username, $token, $link)
{
    $sql = "INSERT INTO token (username,token) VALUES (?,?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        $param_username = $username;
        $param_token = $token;
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_token);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            return false;
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate credentials
    if (empty($email_err)) {
        $sql = "SELECT username  FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $username);
                    if (mysqli_stmt_fetch($stmt)) {
                        error_log("email:" . $username, 0);
                        $token = md5($email) . rand(10, 9999);
                        if (insert_token($username, $token, $link)) {
                            $link = "<a href='http://localhost/tutorial10/usr/reset-password-confirm.php?key=" . $username . "&token=" . $token . "'>Click To Reset password</a>";
                            require_once('../mail_setup.php');
                            $mail->addAddress($email, $username);
                            $mail->Subject  =  'Reset Password';
                            $mail->Body    = 'Click On This Link to Reset Password ' . $link . '';
                            if ($mail->Send()) {
                                echo "success";
                            } else {
                                echo "Mail Error - >" . $mail->ErrorInfo;
                            }
                        }
                    }
                } else {
                    $login_err = "Invalid email address";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper">
        <div id="loginContainer">
            <?php
            if (!empty($login_err)) {
                echo '<div class="alert">' . $login_err . '</div>';
            }
            ?>
            <form action="reset-password.php" method="POST">
                <h3>Reset-Password</h3>
                <input type="email" id="email" name="email" placeholder="Your email.." <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                <div class="gp-btn">
                    <input type="submit" value="Reset" class="reset">
                    <button class="cancel"><a href="login.php">Cancel</a></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
