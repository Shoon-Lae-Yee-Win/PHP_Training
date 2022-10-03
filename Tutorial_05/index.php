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
    $file = "all_file/sample.txt";
    $handle = fopen($file, 'r');
    if (file_exists($file)) {
        echo fread($handle, filesize($file));
    }
    fclose($handle);
    ?>
    <hr>
    <h1>Reading File (csv)</h1>
    <?php
    $csvfile = fopen("all_file/sample.csv", "r");
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
    $path = __DIR__ . "\\vendor\\autoload.php";
    require_once $path;

    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load(__DIR__ . "\\all_file/sample.xlsx");
    $d = $spreadsheet->getSheet(0)->toArray();
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    $i = 0;
    unset($sheetData[0]);
    ?>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Major</th>
                <th>Year</th>
                <th>Pass/Faill</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sheetData as $t) { ?>
                <tr>
                    <td><?php echo $t[0]; ?></td>
                    <td><?php echo $t[1]; ?></td>
                    <td><?php echo $t[2]; ?></td>
                    <td><?php echo $t[3]; ?></td>
                    <td><?php echo $t[4]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <hr>
    <h1>Reading File (doc)</h1>
    <h2>READ With PHPWord Library</h2>
    <?php
    require_once __DIR__ . "\\vendor\\autoload.php";
    $source = __DIR__ . "\\all_file/sample.doc";
    $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
    ?>
    <div class='w-border'>
        <?php
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                    foreach ($element->getElements() as $e) {
                        if ($e instanceof \PhpOffice\PhpWord\Element\Text) {
                            $style = $e->getFontStyle();
                            $size = $style->getSize();
                            $color = $style->getColor();
                            echo '<p style="font-size:' . $size . 'px; color: #' . $color . '">'
                                . $e->getText() . '</p>';
                        }
                    }
                }
            }
        }
        ?>
    </div>
    ?>
</body>

</html>
