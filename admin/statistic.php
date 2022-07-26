<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:adminlog.php");
exit();
}

require_once "connection.php";



$record = $activity = $date = $yes = $no = $remarks = "";
$record_err = $activity_err = $date_err = $yes_err = $no_err =$remarks_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty(mysqli_real_escape_string($link, $_REQUEST['record_id']))){
$record_err = "Insert record Id";
}
else
{
$record = mysqli_real_escape_string($link, $_REQUEST['record_id']);
}

if(empty(mysqli_real_escape_string($link, $_REQUEST['activity']))){
$activity_err = "Fill in activity";
}
else
{
$activity = mysqli_real_escape_string($link, $_REQUEST['activity']);
}

if(empty(mysqli_real_escape_string($link, $_REQUEST['event_date']))){
$date_err = "Enter dates";
}
else
{
$date = mysqli_real_escape_string($link, $_REQUEST['event_date']);
}

if(empty(mysqli_real_escape_string($link, $_REQUEST['yes_total']))){
$yes_err = "Enter Yes option total";
}
else
{
$yes = mysqli_real_escape_string($link, $_REQUEST['yes_total']);
}

if(empty(mysqli_real_escape_string($link, $_REQUEST['no_total']))){
$no_err = "Enter No option total";
}
else
{
$no = mysqli_real_escape_string($link, $_REQUEST['no_total']);
}

if(empty(mysqli_real_escape_string($link, $_REQUEST['remarks']))){
$remarks_err = "Fill in a remark";
}
else
{
$remarks = mysqli_real_escape_string($link, $_REQUEST['remarks']);
}

if(empty($record_err) && empty($activity_err) && empty($date_err) && empty($yes_err) && empty($no_err) && empty($remarks_err)){

$sql = "INSERT INTO statistics (Record_id, Activity, Operation_date, Option_Yes_total, Option_No_total, Remarks) VALUES
(?,?,?,?,?,?)";

if($stmt = mysqli_prepare($link, $sql)){
mysqli_stmt_bind_param($stmt, "ssssss", $recd, $acti,$opdate,$opyes,$opno,$remark);
$recd = $record;
$acti = $activity;
$opdate = $date;
$opyes = $yes;
$opno = $no;
$remark = $remarks;
if(mysqli_stmt_execute($stmt)){
echo "Record inserted Successfully";
}else
{
echo "Error: Could not be able to execute query $sql. " . mysqli_error($link);
}
}
mysqli_stmt_close($stmt);
}
}
mysqli_close($link);
?>


















