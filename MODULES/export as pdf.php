<?php



require_once('./Tcpdf.php');

$html = '<html><head><title>My document</title></head><body><h1>My document</h1><p>Hello, world!</p></body></html>';

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator('My website');
$pdf->SetAuthor('John Doe');
$pdf->SetTitle('My document');
$pdf->SetSubject('Document subject');
$pdf->SetKeywords('keywords, separated, by, commas');

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);
$pdf->setFooterData(array(0,64,0), array(0,64,128));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);

$pdf->AddPage();

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('filename.pdf', 'D');




/* 
// print CV
function printCV(){
    window.print();
}
<button type = "button" class = "print-btn btn btn-primary" onclick="printCV()">Imprimer CV</button>
*/