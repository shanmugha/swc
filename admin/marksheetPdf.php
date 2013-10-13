<?php

require(__DIR__.'/../public/library/fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'ST.ANN\'S SCHOOL',0,0,'C');
        $this->Ln(5);
        $this->SetFont('Courier','',10);
        $this->Cell(80);
        $this->Cell(30,10,'Affiliated to CBSE, No 930688',0,0,'C');

        $this->Ln(5);
        $this->SetFont('Times','B',10);
        $this->Cell(80);
        $this->Cell(30,10,'AYOOR-691 533, KOLLAM (DIST), KERALA ',0,0,'C');
        $this->Line(20, 30, 210-20, 30); // 20mm from each edge
        // Line break
        $this->Ln(10);
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
//print_r($_POST);die;
if(!empty($_POST)){
    $admissionNo  = $_POST['admNo'];
    $studentName  = $_POST['studName'];
    $guardianName = $_POST['guardianName'];
    $dob          = $_POST['dob'];
    $fa1          = $_POST['fa1'];
    $fa2          = $_POST['fa2'];
    $fa3          = $_POST['fa3'];
    //print_r($_POST['admNo']);die;
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80);
$pdf->Cell(30,10,'Certificate Examination (Class IX) Results 2013 ',0,0,'C');
$pdf->Ln(40);

$pdf->SetFont('Courier','B',10);
$pdf->Cell(10);
$pdf->Cell(20,10,'Reg No           : '.$admissionNo,0,0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(20,10,'Name of Student  : '.$studentName,0,0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(20,10,'Name Of Guardian : '.$guardianName,0,0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(20,10,'DOB              : '.$dob,0,0);


$pdf->Ln(40);
$pdf->Cell(35,5,'MARK FA1',1,0,'C',0);
$pdf->Cell(35,5,'MARK FA2',1,0,'C',0);
$pdf->Cell(35,5,'MARK FA3',1,0,'C',0);
$pdf->Cell(35,5,'GRAND TOTAL',1,0,'C',0);
$pdf->Cell(35,5,'GRADE',1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(35,20,$fa1,1,0,'C',0);
$pdf->Cell(35,20,$fa2,1,0,'C',0);
$pdf->Cell(35,20,$fa3,1,0,'C',0);
$pdf->Cell(35,20,'NIL',1,0,'C',0);
$pdf->Cell(35,20,'NIL',1,0,'C',0);
$pdf->Ln(20);
$pdf->Cell(175,10,'Result',1,0,'',0);
$pdf->Output();
?>



