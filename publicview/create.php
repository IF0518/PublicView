<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "PublicView";

$link = mysqli_connect($servername,$username,$password,$db);
if(!$link){
die("connection failed " . mysqli_connect_error());
}

$dbselect = mysqli_select_db($link, 'PublicView');
if(!$dbselect){
die("database selection failed " . mysqli_error($link));
}

$username = $password = $confirm = $wrongid = $system = $msg =  "";
$username_err = $password_err = $confirm_err = $system_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){


if(empty(mysqli_real_escape_string($link, $_REQUEST['username']))){
$username_err = "Please enter registered Id_number";
}
else
{
$sql = "SELECT * FROM users WHERE Id_number = ?";
if($stmt = mysqli_prepare($link, $sql)){
mysqli_stmt_bind_param($stmt, "i", $param_username);
$param_username = $_REQUEST['username'];
if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) == 1){
$msg = "ID_number is registered <br/>";
}else{
$username_err = "Have you really registered, please give a valid registered Id_number .<br>";
echo $username_err;
exit();
}
}else{
echo "oops! Something went wrong.Please try again later";
}}
mysqli_stmt_close($stmt);
}



if(empty(mysqli_real_escape_string($link, $_REQUEST['password']))){
$password_err = "Please enter  your password";
}
else
{ 
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
}

if(empty(mysqli_real_escape_string($link, $_REQUEST['confirm']))){
$confirm_err = "Please enter confirm password";
}
else
{
$confirm = mysqli_real_escape_string($link, $_REQUEST['confirm']);
if(empty($password_err) && ($password !== $confirm)){
$confirm_err = "Password did not match";
}}
$sql = "SELECT * FROM users WHERE System_id = 987654321 AND Id_number = ?";
if($stmt = mysqli_prepare($link, $sql)){
mysqli_stmt_bind_param($stmt, "i", $param_ids);
$param_ids = $_REQUEST['username'];
if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) == 1){
echo "System id about to be generated";
} 
else {
$system_err = "Ensure you register once with the system";
}
}else{
echo "Oops! Something went wrong please try again later";
}
}
mysqli_stmt_close($stmt);

if(empty($username_err) && empty($password_err) && empty($confirm_err) && empty($system_err)){
$sql = "UPDATE users SET Password = ?, System_id = ? WHERE Id_number = ?";

if($stmt = mysqli_prepare($link, $sql)){

mysqli_stmt_bind_param($stmt, 'sii', $param_password,$param_sys, $param_id);
$param_password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
$param_sys = rand(23654789, 94657834);
$param_id = $_REQUEST['username'];

if(mysqli_stmt_execute($stmt)){
header("location:login.php");
}
else{
echo "Oop!You should have been registered to create password";
}
}else{ 
echo "Error: Could not prepare query $sql. " . mysqli_error($link);
}

mysqli_stmt_close($stmt);
}
}

mysqli_close($link);
?>
