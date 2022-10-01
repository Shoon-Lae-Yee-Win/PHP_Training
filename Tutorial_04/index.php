<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04</title>
    <link rel="stylesheet" href="css/reset.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>PLEASE LOGIN</h1>
    <div class="form-blk">
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger  align-items-center" role="alert">
                <div class="px-2">
                    <i class="fa-solid fa-triangle-exclamation"></i> Your username is Wrong!Please Try again!
                </div>
            </div>
        <?php
        }
        ?>
        <form method="POST" action="login.php">
            <label for="user">User:</label>
            <input type="text" name="user" id="user" placeholder="Enter username...." required />
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter password..." required />
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>
