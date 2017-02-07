<?php

    require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
function pdf_create($html, $filename, $stream=TRUE){

    // instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
    // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
  
    
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename.".pdf");
  //  $dompdf->stream($filename.".pdf");
    
    $pdf = $dompdf->output();
$file_location = "docs/";
file_put_contents($file_location,$pdf); 
    
}

/*$filename = 'file_name';
$html = file_get_contents('docs/acp/form3.php');
pdf_create($html, $filename);*/
?>