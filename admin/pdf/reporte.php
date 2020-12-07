<?php
require_once  '../../vendor/autoload.php';

setlocale(LC_TIME, 'spanish');
setlocale(LC_TIME, 'es_ES.UTF-8');
date_default_timezone_set('America/Bogota');
ob_start();

require './report-client.php';
$html = ob_get_clean();
// print_r($html);
$mpdf = new \Mpdf\Mpdf([
    'default_font' => 'tharlon',
    'mode' => 'c',
    'margin_left' => 12,
    'margin_right' => 12,
    'margin_top' => 18,
    'margin_bottom' => 13
]);


$mpdf->allow_charset_conversion = true;

$mpdf->WriteHTML($html);
$mpdf->Output('reporte.pdf', 'I');
