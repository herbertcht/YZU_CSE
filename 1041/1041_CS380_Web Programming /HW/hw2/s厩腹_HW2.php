<?php

require_once('tcpdf/tcpdf_import.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('cid0jp','', 18); 
$pdf->AddPage();

/*---------------- Your Code Start -----------------*/
$name = $_POST['name'];
$html = <<<EOF
<table>
<tr>
	<td>$name</td>
</tr>
</table>
EOF;
/*---------------- Your Code End -------------------*/

$pdf->writeHTML($html);
$pdf->lastPage();
$pdf->Output('order.pdf', 'I');
