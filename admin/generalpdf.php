<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:adminlog.php");
exit();
}
require_once "connection.php";


$sql = "SELECT  Comment FROM project Where Opinion = 'YES' OR Opinion = 'NO' AND NOT(Comment = 'NULL' OR Comment = '')";
$result = mysqli_query($con, $sql) or die("Error, fail to execute $sql " . mysqli_error($con));
require('fpdf.php');

$pdf = new FPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('Arial', 'B', 12);
$no = 0;
while($field = mysqli_fetch_field($result)){
$pdf -> MultiCell(180,20, $field -> name,"Alignment = B");
}
while($row=mysqli_fetch_assoc($result)){
$pdf -> SetFont('Arial', "",10);
$pdf -> Ln();
$no += 1;
foreach($row as $column){
$pdf -> MultiCell(180, 15,$no . '. ' . $column);
}
}
$pdf -> Output();

?>
