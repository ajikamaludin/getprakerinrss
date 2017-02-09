<?php

function download_jurnal_pdf($email){

	require_once 'dompdf/autoload.inc.php';

	//use Dompdf\Dompdf;
	//use Dompdf\Options;

	$id = getid_pengguna($email);
	$html = 'http://localhost/getprakerin/view/print/print_jurnal.php?id='.$id;
	$options = new Options();
	$options->set('isRemoteEnabled', TRUE);
	$dompdf = new Dompdf($options);


	$dompdf->set_option('isHtml5ParserEnabled', true);
	$dompdf->loadHtmlfile($html);

	$dompdf->setPaper('A4', 'portrait');

	$dompdf->render();

	$dompdf->stream($user);
}


?>