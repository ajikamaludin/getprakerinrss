<?php

session_start();
$email = $_SESSION['user'];
require_once 'dompdf/autoload.inc.php';

$html = 'http://localhost/getprakerin/view/print/print_jurnal.php?email='.$email;

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

$user = time();
// Output the generated PDF to Browser
$dompdf->stream($user);

?>
