<?php
require_once("PDF/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();


$imagePath = 'OIG.jpeg';
if (file_exists($imagePath)) {
    $pdf->Image($imagePath, 160, 10, 30);
}

// Title
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(0, 51, 102); 
$pdf->Cell(0, 20, 'Registration Details', 0, 1, 'C');
$pdf->SetLineWidth(0.6);
$pdf->Line(10, 30, 160, 30);
$pdf->Ln(10); 


$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(230, 230, 250); 
$pdf->SetDrawColor(0, 51, 102); 

// Registration details
$details = [
    'Name' => 'Abdul',
    'Last Name' => 'Salam',
    'Email' => 'abc@gmail.com',
    'Password' => '12345',
    'Gender' => 'Male',
    'Date of Birth' => '01/04/1995',
    'Home Town' => 'Badin'
];

$pdf->SetX(20); 
$pdf->SetY(40); 
foreach ($details as $key => $value) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(40, 10, $key . ': ', 1, 0, 'L', true); 
    $pdf->SetTextColor(153, 0, 153);
    $pdf->Cell(110, 10, $value, 1, 1, 'L', true); 
    $pdf->Ln(3); // Space between rows
}


$pdf->SetY(-30);
$pdf->SetFont('Arial', 'I', 10);
$pdf->SetTextColor(128, 128, 128);
$pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C');

$pdf->Output();