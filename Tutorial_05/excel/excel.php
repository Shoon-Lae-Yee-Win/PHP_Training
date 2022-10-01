<?php
$path = __DIR__ . "\\vendor\\autoload.php";
require_once $path;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load(__DIR__ . "\\sample.xlsx");
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
