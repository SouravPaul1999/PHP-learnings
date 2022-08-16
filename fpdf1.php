

<?php

function Fun($k)
{
  # code...
  $k=10000;
  return $k;
}
$c= Fun($b);
require('./composer-project/vendor/setasign/fpdf/fpdf.php');
//create a FPDF object
$pdf= new FPDF('p','mm','A4');

//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('FPDF tutorial');

//set font for the entire document
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);

//set up a page
$pdf->AddPage('P');
// $pdf->SetDisplayMode(real,'default');

//insert an image and make it a link
// $pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

//display the title with a border around it
$pdf->SetXY(50,20);
$pdf->SetDrawColor(255,0,0);
$pdf->Cell(100,10,'FPDF Tutorial'.$c,'B',0,'C',0);

//Set x and y position for the main text, reduce font size and write content
$pdf->SetXY (10,50);
$pdf->SetFontSize(10);
$pdf->Write(5,$c);
//Output the document
$pdf->Output('I','photos/g-card-example1.pdf');
// $pdf->Output('example1.pdf','D');


?>