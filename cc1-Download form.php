


<?php
// include Dompdf library
include_once ('./cc1-CV presentation page.php');
require_once './MODULES/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// initialize the Dompdf object
$dompdf = new Dompdf();

// set the selector for the part of the page to convert
$selector = '.container2';

ob_start();
$newHtml = ob_get_contents();
ob_get_clean();

// add the selected element(s) to the PDF
$dompdf->loadHtml('hello');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// set the PDF filename and output options
$user_id = $_SESSION['user_id'];
$cv_id = $_SESSION['cv_id'];
$Pic_id = $_SESSION['pic_id'];

$filename = $user_id.$cv_id.$Pic_id.'.pdf';
$dest = './DOCS';

// prompt the user to download the PDF file
$dompdf->stream($filename, array('Attachment' => false));
