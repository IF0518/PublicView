<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:adminlog.php");
exit();
}
require_once "connection.php";
$opinion = $comment = "";
$opinion_err = $comment_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty(mysqli_real_escape_string($con, $_REQUEST['opinion']))){
$opinion_err = "Please enter Null to update the database";
}
else
{
$opinion = mysqli_real_escape_string($con, $_REQUEST['opinion']);
}

if(empty(mysqli_real_escape_string($con, $_REQUEST['comment']))){
$comment_err = "Please enter Null to update the database";
}
else{
$comment = mysqli_real_escape_string($con, $_REQUEST['comment']);
}

if(empty($opinion_err) && empty($comment_err)){
$sql= "UPDATE users SET Opinion = ?, Comment = ?";

if($stmt = mysqli_prepare($con, $sql)){
mysqli_stmt_bind_param($stmt, "ss", $param_op, $param_co);
$param_op = $opinion;
$param_co = $comment;
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


