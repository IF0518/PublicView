<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:adminlog.php");
exit();
}
require_once "connection.php";
$close = "";
$close_err = "";
if($_SERVER["REQUEST_METHOD"]="POST"){
if(!isset($_POST['close'])){
$close_err = "Please enter Closed to update the database";
}
else
{
$close = trim($_POST['close']);
}

if(empty($close_err)){
$sql= "UPDATE users SET Opinion = ? WHERE Id_number = ?";

if($stmt = mysqli_prepare($con, $sql)){
mysqli_stmt_bind_param($stmt, "si", $param_op, $param_id);
$param_op = $close;
$param_id = 1112223;
if(mysqli_stmt_execute($stmt)){
echo "successfully updated";
}
else
{ 
echo "Oops! Something went wrong.Please try again later";
}
}
mysqli_stmt_close($stmt);


}
}
mysqli_close($con); 
?>


