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

$username = $password = $confirm = $system = "";
$username_err = $password_err = $confirm_err = $system_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty(mysqli_real_escape_string($link, $_REQUEST['phone']))){
$system_err = "Fill in your system_Id to change password";
}
else
{
$sql = "SELECT * FROM users WHERE Tell_number = ? AND Id_number = ?";
if($stmt = mysqli_prepare($link, $sql)){
mysqli_stmt_bind_param($stmt, "i", $param_sys, $param_ids);
$param_sys = $_REQUEST['phone'];
$param_ids = $_REQUEST['username'];
if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) == 1){
echo " can continue setting password";
} else {
$system_err = "Already registered with the system";
echo $system_err;
}
}else{
echo "Oops! Something went wrong please try again later";
}
}
mysqli_stmt_close($stmt);
}

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
$username = "Register user";
}else{
$username_err = "Have you really registered for Huduma number";
exit;
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

if(empty($username_err) && empty($password_err) && empty($confirm_err)){
$sql = "UPDATE users SET Password = ? WHERE Id_number = ?";

if($stmt = mysqli_prepare($link, $sql)){

mysqli_stmt_bind_param($stmt, 'si', $param_password, $param_id);
$param_password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
$param_id = $_REQUEST['username'];

if(mysqli_stmt_execute($stmt)){
session_destroy();
header("location:login.php");
}
else{
echo "Oop!You should have registered for Huduma number to create password";
}
}else{ 
echo "Error: Could not prepare query $sql. " . mysqli_error($link);
}

mysqli_stmt_close($stmt);
}
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
<title>Create password</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{
background:#faebc5;
margin:0px;
font-family:Arial;
}
.container{
background:white;
margin:auto;
text-align:center;
width:80%;
height:auto;
border:3px solid #34eadc;
border-radius:5%;
color:#bc2765;
}
input[type=text],input[type=password]{
margin:20px auto 19px auto;
font-size:15px;
padding:15px;
background:white;
color:black;
width:50%;
border:2px solid #ebca43;
}
.but{
background:#eac654;
margin:20px auto 19px auto;
color:#ead654;
padding:15px;
border:2px solid #fbaced;
font-size:25px;
width:50%;

}
label{
font-size:25px;
color:brown;
} 
</style>
</head>
<body>
<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
<h1>Change your password for publicviewkenya system</h1>
<h3>Fill in the field for National id no. and password fields to set a new secret password for login in.</h3>
<label for ="Phone_Number">Phone_Number</label><br/>
<input type = "text" name="phone" placeholder="Phone_number"><br/>
<span style="color:rgb(255,12,10)"><?php echo $system_err; ?></span><br/>
<label for="national id">National id</label><br/>
<input type="text" name="username" placeholder="National id"/><br/>
<span style="color:rgb(255,12,10)"><?php echo $username_err; ?></span><br/>
<label for="password">Password</label><br/>
<input type="password" name="password" placeholder="fill password"/><br/>
<span style="color:rgb(255,12,10)"><?php echo $password_err; ?></span><br/>
<label for="Confirm-assword">Confirm-password</label><br/>
<input type="password" name="confirm" placeholder="confirm-password"/><br/>
<span style="color:rgb(255,12,10)"><?php echo $confirm_err; ?></span>
<div class="but">
<input type="submit" value="Change password"><br/><input type="reset" value="Reset">
</div>
</form>
</div>
</body>
</html>


