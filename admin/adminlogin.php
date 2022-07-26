<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
header("location:home.php");
exit();
}
require_once "connection.php";
$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty(trim($_POST['adminname']))){
$username_err = "Admin username must be filled";
}
else
{
$username = trim($_POST['adminname']);
}

if(empty(trim($_POST['password']))){
$password_err = "Admin password must be filled";
}
else
{
$password = trim($_POST['password']);
}

if(empty($username_err) && empty($password_err)){

$sql = "SELECT Admin_id,first_name, last_name, phone_number,Email, Password, ID_Number FROM admin WHERE Admin_id = ?";

if($stmt = mysqli_prepare($con, $sql)){
mysqli_stmt_bind_param($stmt, "s", $param_id);
$param_id = $username;
if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) == 1){
mysqli_stmt_bind_result($stmt, $admin_id, $fn, $ln, $tell, $email, $hashed_password, $idno);
if(mysqli_stmt_fetch($stmt)){
if(password_verify($password, $hashed_password)){
session_start();
$_SESSION["loggedin"] = TRUE;
$_SESSION["Admin_id"] = $admin_id;
$_SESSION["first_name"] = $fn;
$_SESSION["last_name"] = $ln;
$_SESSION["phone_number"] = $tell;
$_SESSION["ID_Number"] = $idno;
$_SESSION["Email"] = $email;

header("location: home.php");
exit();
}
else
{
$password_err = "Provide a valid Admin password";
}
}
}
else
{
$username_err = "No admin with such username";
}}
else
{
echo "Oops! Something went wrong. Please try again later.";
}
}
mysqli_stmt_close($stmt);
}
}
mysqli_close($con);
?>
