<?php
require_once "connection.php";
$adminid = $password = $confirm = "";
$adminid_err = $password_err = $confirm_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty(mysqli_real_escape_string($con, $_REQUEST['adminid']))){
$adminid_err = "Enter admin Id";
}
else
{
$sql = "SELECT * FROM admin WHERE Admin_id = ?";

if($stmt = mysqli_prepare($con, $sql)){
mysqli_stmt_bind_param($stmt, "s", $param_id);
$param_id = $_REQUEST['adminid'];
if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) == 1){
echo "Registered Admin id, proceed";
}
else
{
$adminid_err = "Wrong Id, provide valid Id";
}
} else { echo "Oops! Something went wrong. Try again later.";
}
}
mysqli_stmt_close($stmt);
}

if(empty(mysqli_real_escape_string($con,$_REQUEST['password']))){
$password_err = "Fill in password";
}
else
{
$password = mysqli_real_escape_string($con, $_REQUEST['password']);
}

if(empty(mysqli_real_escape_string($con, $_REQUEST['confirm']))){
$confirm_err = "Fill in confirm password";
}
else
{
$confirm = mysqli_real_escape_string($con, $_REQUEST['confirm']);
if(empty($password_err) && ($password !== $confirm)){
$confirm_err = "password did not match";
}
}

if(empty($adminid_err) && empty($password_err) && empty($confirm_err)){
$sql = "UPDATE admin SET Password = ? WHERE Admin_id = ?";

if($stmt = mysqli_prepare($con, $sql)){
mysqli_stmt_bind_param($stmt, "ss", $param_pass, $param_id);
$param_pass = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
$param_id = $_REQUEST['adminid'];
if(mysqli_stmt_execute($stmt)){
header("location:index.php");
}
else
{
echo "oops!something went wrong. Please try again later";
}
}
mysqli_stmt_close($stmt);
}
}
mysqli_close($con);
?>












