<?php
echo "<h2>READ With PHPWord Library</h2>";
require_once __DIR__ . "\\vendor\\autoload.php";
$source = __DIR__ . "\\sample.doc";
$phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
echo "<div class='w-border'>";
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
echo "</div>";

