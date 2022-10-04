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
                    <input type="text" name="text" placeholder="Enter something text....">
                    <?php if (isset($_POST['submit'])) {
                        if (empty($_POST['text'])) { ?>
                            <span><b>Please fill something!</b></span>
                    <?php }
                    } ?>
                    <input type="submit" value="Submit" name="submit">
                </div>
            </form>
        </div>
        <?php
        require_once('phpqrcode/qrlib.php');
        if (isset($_POST['submit'])) {
            if (empty($_POST['name']) && empty($_POST['text'])) {
                echo "";
            } else {
                $path = 'images/';
                $qrcode = $path . $_POST['name'] . ".png";
                $text = $_POST['text'];
                echo '<div class="rgt-blk"><h3>Username :' . $_POST['name'] . " - " . " Qrcode is here!</h3>";
                Qrcode::png($text, $qrcode, 15, 15); ?>
                <img src='images/<?php echo $_POST['name']; ?>.png'>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>
