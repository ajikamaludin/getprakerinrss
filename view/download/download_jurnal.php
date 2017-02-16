<?php

$email = $_GET['email'];
$nama = $_GET['nama'];
$nama = 'LUA_'.$nama.date('_M-d-Y');

include '../../function/config_functions.php';

require_once 'dompdf/autoload.inc.php';

$html = ACCESS_FROM.'/view/print/print_jurnal.php?email='.$email;

use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf = new Dompdf($options);


$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->loadHtmlfile($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$output = $dompdf->output($nama);
file_put_contents('pdf/'.$nama.'.pdf', $output);

$dompdf->stream($nama);
?>
