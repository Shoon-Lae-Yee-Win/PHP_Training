<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_07</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Qrcode with Username!</h1>
    <div class="blk clearfix">
        <div class="form-blk clearfix">
            <form method="POST" action="">
                <div class="input-blk">
                    <label>Your Name : </label>
                    <input type="text" name="name" placeholder="Enter username...">
                    <?php if (isset($_POST['submit'])) {
                        if (empty($_POST['name'])) { ?>
                            <span><b>Please fill your name!</b></span>
                    <?php }
                    } ?>
                    <br><br>
                    <input type="submit" value="Submit" name="submit">
                </div>
            </form>
        </div>
        <?php
        require_once('phpqrcode/qrlib.php');
        if (isset($_POST['submit'])) {
            if (empty($_POST['name'])) {
                echo "";
            } else {
                $path = 'images/';
                $name = $_POST['name'];
                $qrcode = $path . $_POST['name'] . ".png";
                echo '<div class="rgt-blk"><h3>Username :' . $_POST['name'] . " - " . " Qrcode is here!</h3>";
                Qrcode::png($name, $qrcode, 15, 15); ?>
                <img src='images/<?php echo $_POST['name']; ?>.png'>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>
