<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:adminlog.php");
exit();
}

require_once "connection.php";



$option ="";
$option_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty(mysqli_real_escape_string($link, $_REQUEST['option']))){
$option_err = "Please enter Yes or No option";
echo $option_err;
}
else
{
$option = mysqli_real_escape_string($link, $_REQUEST['option']);
}

if(empty($option_err)){

$sql = "SELECT Opinion, Comment FROM users WHERE Opinion = '$option'";

if($result = mysqli_query($link, $sql)){
if(mysqli_num_rows($result) > 0){
echo "<table>";
echo "<tr>";
echo "<td>Opinion</td>";
echo "<td>Comment</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td>" . $row['Opinion'] . "</td>";
echo "<td>" . $row['Comment'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_free_result($result);
}
else
{
echo "No data fetched";
}
}
else
{
echo "Error: could not execute query $sql. " . mysqli_error($link);
}
}
}
mysqli_close($link);
?>





