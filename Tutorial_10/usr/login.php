<?php
session_start();
require_once "../database/config.php";

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../index.php");
    exit;
}
$email = $password = "";
$email_err = $password_err = $login_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($email_err) && empty($password_err)) {
        $query = "SELECT id, email, password FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($link, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $email, $d_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($password === $d_password) {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            header("location: ../index.php");
                        } else {
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid email or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/reset.css">
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
            <form action="" method="POST">
                <h3>Login page</h3>
                <input type="email" name="email" id="email" placeholder="Your email.." <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                <input type="password" name="password" id="password" name="password" placeholder="Your password.." <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                <input type="submit" value="Login">
                <p><a href="reset-password.php">Forgot password?</a></p>
                <p id="bottom">Don't have account yet! <a href="register.php" id="signup">Sign Up here</a></p>
            </form>
        </div>
    </div>
</body>

</html>
