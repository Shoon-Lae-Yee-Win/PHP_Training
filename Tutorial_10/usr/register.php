<?php
require_once "../database/config.php";
$username = $password = $email = "";
$username_err = $password_err = $email_err = $sameEmail_err = "";
$email_same = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name
    $input_name = trim($_POST["username"]);
    if (empty($input_name)) {
        $username_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $username_err = "Please enter a valid name.";
    } else {
        $username = $input_name;
    }

    //validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please fill email.";
    } else {
        $email = $input_email;
        $select = mysqli_query($link, "SELECT * FROM users WHERE email = '" . $email . "'");
        if (mysqli_num_rows($select)) {
            $sameEmail_err = "Email Already Exist!";
            $email_same = true;
        } else {
            $email_same = false;
        }
    }

    //validate password
    $input_password = trim($_POST["password"]);
    if (empty($input_password)) {
        $password_err = "Please fill password.";
    } else {
        $password = $input_password;
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($email_err) && !$email_same) {
        $sql = "INSERT INTO users (username,password,email) VALUES (?,?,?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            $param_username = $username;
            $param_password = $password;
            $param_email = $email;
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);
            if (mysqli_stmt_execute($stmt)) {
                header("location:../index.php");
                exit();
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper">
        <div id="loginContainer">
            <?php
            if ($email_same) {
                echo '<div class="alert">' . $sameEmail_err . '</div>';
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="registerform" method="POST">
                <h3>Sign Up</h3> <input type="text" name="username" id="username" placeholder="Your name.." <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                <input type="password" name="password" id="password" placeholder="Your password.." <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span> <input type="email" name="email" id="email" placeholder="Your Email.." <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                <input type="submit" value="Create Your Account" name="submit">
                <p id="bottom">Already have an account?<a href="login.php" id="signin"> Signin</a></p>
            </form>
        </div>
    </div>
</body>

</html>
