<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML(file_get_contents('http://omccompliance.com/exportuser.php'));
$mpdf->Output();
?>