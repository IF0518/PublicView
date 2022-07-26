<?php
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
?>
