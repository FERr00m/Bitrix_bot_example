<?php
//require_once '../parsing_PHP-master/index.php';
//$url ='https://snipp.ru/handbk/emoji';
//
//$selectors = array(
//    'section' => 'section',
//    'title' => '.view_anchor a',
//    'table' => '.tbl.tbl-emj'
//);
//$smiles = make_array_news($url, $selectors);
//// Открываем файл для получения существующего содержимого
$file = './smiles.csv';
//$current = file_get_contents($file);
//foreach ($smiles as $smile)
//    {
//        $title = $smile['TITLE'];
//        foreach ($smile['SMILES'] as $key => $item)
//        {
//            // Добавляем в файл строку
//            $current .= "$key,$title,$item\n";
//        }
//        $current .= "END\n";
//    }
//
//file_put_contents($file, $current);
$csv = array_map('str_getcsv', file($file));
$smiles = [];
foreach ($csv as $line)
{
    $id = $line[0];
    $categoty = $line[1];
    $smile = $line[2];
    $smiles[$categoty][] = $smile;
}
echo '<pre>';
var_dump($smiles);
echo '</pre>';


