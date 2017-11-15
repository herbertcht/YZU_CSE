<?php

require_once('tcpdf/tcpdf_import.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('cid0jp','', 18); 
$pdf->AddPage();

/*---------------- Your Code Start -----------------*/
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, 
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$input1 = $_POST['order'];
$input2 = $_POST['name'];
$input3 = $_POST['tel'];
$input4 = $_POST['email'];
$input5 = $_POST['address'];
$order="";
$n=0;
if(isset($input1))
{
    $n = count($input1)-1;
    for($i=0; $i < $n; $i++)
    {
      $order=$order.$input1[$i] . ",";
    }
	$order=$order.$input1[$n];
}
else
{
	$order="請確認餐點";
}

$pdf->Text(160, 20, '訂單號碼');
$pdf->Ln();
$pdf->write1DBarcode($input3, 'S25', '150', '', '', 18, 0.4, $style, 'N');
$pdf->Ln();

$html = <<<EOF
		<table border="1">
			<tr>
				<td>訂購人:</td>
				<td>$input2</td>
				<td>電話:</td>
				<td>$input3</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td colspan="3">$input4</td>
			</tr>   
			<tr>
				<td>地址:</td>
				<td colspan="3" >$input5</td>
			</tr>
			<tr>
				<td>訂購餐點</td>
				<td colspan="3" style="color:red">$order</td>
			</tr>
		</table>
EOF;
/*---------------- Your Code End -------------------*/

$pdf->writeHTML($html);
$pdf->lastPage();
$pdf->Output('order.pdf', 'I');
