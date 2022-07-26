<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:adminlog.php");
exit();
}
require_once "connection.php";
$opinion = $query = "";
$opinion_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty(mysqli_real_escape_string($con, $_REQUEST['opinion']))){
$opinion_err = "provide opinion to get total votes";
echo $opinion_err;
}
else
{
$opinion = mysqli_real_escape_string($con, $_REQUEST['opinion']);
}

if(empty($opinion_err)){
$sql = "SELECT Opinion FROM project WHERE Opinion = ?";

if($stmt = mysqli_prepare($con,  $sql)){
mysqli_stmt_bind_param($stmt, "s", $param_op);
$param_op = $_REQUEST['opinion'];
if(mysqli_execute($stmt)){
mysqli_stmt_store_result($stmt);
$query = $opinion . "  Option total: " . mysqli_stmt_num_rows($stmt);
mysqli_stmt_free_result($stmt);
}else{
echo "Input YES or NO option please";
}
}
mysqli_stmt_close($stmt);

}
}
mysqli_close($con);
?>
