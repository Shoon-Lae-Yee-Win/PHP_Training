<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial05</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Reading File (text)</h1>
    <?php
    $file = "sample.txt";
    $handle = fopen($file, 'r');
    if (file_exists($file)) {
        echo fread($handle, filesize($file));
    }
    fclose($handle);
    ?>
    <hr>
    <h1>Reading File (csv)</h1>
    <?php
    $csvfile = fopen("sample.csv", "r");
    if ($csvfile !== FALSE) {
    ?>
        <table>
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>COLOR</th>
                    <th>PRICE</th>
                </tr>
            </thead>
            <?php
            while (!feof($csvfile)) {
                $data = fgetcsv($csvfile, 1000, ",");
                if (!empty($data)) {
            ?>
                    <tr>
                        <td><?php echo $data[0]; ?></td>
                        <td>
                            <div style="background-color: <?php echo $data[2] ?>;"><?php echo $data[1]; ?></div>
                        </td>
                        <td><?php echo $data[3]; ?></td>
                    </tr>
                <?php } ?>
            <?php
            }
            ?>
        </table>
    <?php
    }
    fclose($csvfile);
    ?>
    <hr>
    <h1>Reading File (Excel)</h1>
    <?php
    require_once('./excel/excel.php');
    ?>
    <hr>
    <h1>Reading File (doc)</h1>
    <?php
    require_once('./word/doc.php');
    ?>
</body>

</html>
