
<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
header("location:welcome.php");
exit();
}
$servername="localhost";
$username="root";
$password="";
$db="PublicView";
$link = mysqli_connect($servername, $username, $password, $db);
if(!$link){
die("connection failed " . mysqli_connect_error());
}


$db = mysqli_select_db($link, 'PublicView');
if(!$db){
die("database selection failed. " . mysqli_error($link));
}
$username = $password="";
$username_err = $password_err="";


if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty(trim($_POST['username']))){
$username_err = "Please fill in your username";
}
else{
$username = trim($_POST['username']);
}

if(empty(trim($_POST['password']))){
$password_err= "Please fill in your password";
}
else{
$password = trim($_POST['password']);
}

if(empty($username_err) && empty($password_err)){
$sql= "SELECT Id_number, Firstname, Lastname, Tell_number, County, Password, Opinion, Comment, System_id FROM users WHERE Id_number= ?";

if($stmt = mysqli_prepare($link, $sql)){
mysqli_stmt_bind_param($stmt, "i", $param_username);
$param_username = $username;
if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) == 1){
mysqli_stmt_bind_result($stmt, $id, $firstname, $lastname, $tell, $county, $hashed_password, $opinion, $comment,$systemid);
if(mysqli_stmt_fetch($stmt)){
if(password_verify($password, $hashed_password)){

session_start(); 
$_SESSION["loggedin"] = TRUE;
$_SESSION["Id_number"] = $id;
$_SESSION["Firstname"] = $firstname;
$_SESSION["Lastname"] = $lastname;
$_SESSION["Tell_number"] = $tell;
$_SESSION["County"] = $county;
$_SESSION["Opinion"] = $opinion;
$_SESSION["Comment"] = $comment;
$_SESSION["System_id"] = $systemid;

header("location: welcome.php");
exit();
}else{
$password_err = "Please the password you entered was not valid";
}}}
else{
$username_err = "No account with that username";
}
}else{
echo "oops! something went wrong. please try again later";
}
}else{echo "Error: Could not execute query $sql. " . mysqli_error($link);
}
mysqli_stmt_close($stmt);
}}
mysqli_close($link);
?> 
