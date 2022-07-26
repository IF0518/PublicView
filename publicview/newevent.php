<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
header("location:index.php");
exit();
}
$servername="localhost";
$username="root";
$password="";
$database="PublicView";

$con = mysqli_connect($servername, $username, $password, $database);
 
if(!$con){
die("connection failed " . mysqli_connect_error());
}

$dbselect = mysqli_select_db($con, 'PublicView');
if(!$dbselect){
die("Database selection failed. " . mysqli_error($con));
}

$opinion = "";
$opinion_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(!isset($_POST['opinion'])){
$opinion_err = "Give your opinion please";
}
else{
$sql= "SELECT Id_number, Opinion FROM new_changes WHERE Id_number = ? AND(Opinion = 'YES' OR Opinion = 'NO')";
if($stmt = mysqli_prepare($con, $sql)){
mysqli_stmt_bind_param($stmt, "i", $param_id);
$param_id = $_SESSION["Id_number"];
if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) == 1){
$opinion_err =  $_SESSION["Firstname"] . ", you already voted, Closed! Please wait until  next event.";
}
else{
$opinion = trim($_POST["opinion"]);
}
}else{
echo "Oops! Something went wrong. Please try again later";
}
}
mysqli_stmt_close($stmt);
}

if(empty($opinion_err)){

$sql = "UPDATE new_changes SET Opinion = ?, Comment = ? WHERE Id_number = ?";

if($stmt = mysqli_prepare($con,$sql)){

mysqli_stmt_bind_param($stmt,"ssi", $param_opinion, $param_comment, $param_id);

$param_opinion = $opinion;
$param_comment = trim($_POST["comment"]);
$param_id = $_SESSION["Id_number"];

if(mysqli_stmt_execute($stmt)){
$opinion = "Thanks " . $_SESSION['Firstname'] . ",We have received your vote. We will notify you incase of another event."; 
}else{
echo "oops! Something went wrong, please try again later.";
}
}
mysqli_stmt_close($stmt);
}
mysqli_close($con);
}
?>
