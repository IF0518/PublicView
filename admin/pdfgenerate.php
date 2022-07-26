<?php
$result = mysqli_query($conn,$sql);
require ('fpdf.php');
class Pdf extends FPDF{
function Header(){
$this->SetFont("Arial","B",20);
$this->Cell(50);
$this->Cell(60,10,"Public comments",0,0,"C",false);
$this->Ln(20);
}

function footer(){
$this->SetY(-20);
$this->SetFont("Arial","I",15);
$this->Cell(0,10,"Page No." . $this->pageNo() .,"/{nb}", 0, 0,C,false);
}

$pdf = new Pdf();
$pdf -> AddPage();
$pdf -> AliasNbPages();
$pdf -> setFont("Arial","B", 15);

$width_cell =arry{

