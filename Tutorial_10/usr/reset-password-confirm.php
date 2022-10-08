<?php
if ($_GET['token']) {
    require_once('../database/config.php');
    $token = $_GET['token'];
    $username = $_GET['key'];
    $valide_token = false;
    $sql = "SELECT * FROM token WHERE username='$username'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            if ($row['token'] === $token) {
                $valide_token = true;
            }
        }
    } else {
        echo 'something is wrong';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <div class="card reset-blk">
                    <h3 class="mt-5">Reset Password Comfirm</h3>
                    <div class="card-body">
                        <?php if ($valide_token) { ?>
                            <form action="update-forget-password.php" method="POST">
                                <input type="hidden" name="username" value="<?php echo $username; ?>">
                                <input type="hidden" name="reset_link_token" value="<?php echo $token; ?>">
                                <div class="form-group mb-3">
                                    <input type="password" name='password' class="form-control" placeholder="Enter password...">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name='cpassword' class="form-control" placeholder="Enter comfrim password...">
                                </div>
                                <input type="submit" name="new-password" class="btn btn-primary">
                            </form>
                        <?php } else {   ?>
                            <p>This forget password link is not valid</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
