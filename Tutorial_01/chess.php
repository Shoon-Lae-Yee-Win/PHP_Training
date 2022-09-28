<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_01</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Tutorial_01 (Chess)</h1>
    <table>
        <?php
        for ($row = 1; $row < 9; $row++) {
        ?>
            <tr>
                <?php
                for ($col = 1; $col < 9; $col++) {
                    $total = $row + $col;
                    if ($total % 2 == 0) {
                ?>
                        <td class="white-blk"></td>
                    <?php
                    } else {
                    ?>
                        <td class="black-blk"> </td>
                <?php
                    }
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
