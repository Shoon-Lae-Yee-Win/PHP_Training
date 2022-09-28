<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_02</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Tutorial_02 (diamond)</h1>
    <div class="diamond-blk">
        <?php
        echo "<pre>";
        $numrow = 6;
        for ($row = 1; $row < 6; $row++) {
            for ($upcol = $row; $upcol < 6; $upcol++)
                echo "&nbsp;&nbsp;";
            for ($star = 2 * $row - 1; $star > 0; $star--)
                echo ("&nbsp;*");
            echo "<br>";
        }
        for ($row = 6; $row > 0; $row--) {
            for ($downcol = $numrow - $row; $downcol > 0; $downcol--)
                echo "&nbsp;&nbsp;";
            for ($star = 2 * $row - 1; $star > 0; $star--)
                echo ("&nbsp;*");
            echo "<br>";
        }
        echo "</pre>";
        ?>
    </div>
</body>

</html>