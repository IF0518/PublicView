<?php
require_once "newevent.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Give your opinion</title>
<meta charset="UTF-8">
<link rel="manifest"  href="PV.json">
<meta name="viewport" content="width=device-width, initial scale=1">
<style>
body{
font-family:serif;
background:#dafcbe;
margin:20;
}
.container{
background:#fff;
margin:10px;
height:550px;
border:2px solid #daecb7;
} 
.row{margin:20px;}
.col1{
width:20%;
float:left;
background:#ead68c;
}
.col2{width:75%;
float:left;
background:#b768fa;
margin:3px;
}
.row:after{
content:"";
display:table;
clear:both;
}
.nav {
background:#facb67;
overflow:hidden;
}
.nav a{
font-size:20px;
text-align:left;
display:block;
margin:3px;
color:blue;
text-decoration:none;
}
.dropdowm{
overflow:hidden;
position:relative;
}
.dropdown .dropbut{
border:none;
outline:none;
font-size:18px;
color:blue;
background:inherit;
}
.dropdown-content{
position:absolute;
display:none;
max-width:200px;
z-index:1;
background:rgb(230,109,190);
}
.bod1{
border:2px solid #eafb78;
margin:10px;
background:#fab765;
}
.dropdown-content a{
text-align:left;
color:blue;
font-size:15px;
display:block;
padding:8px;
}
.header{background:#a74b8e;
padding:10px;
margin:10px;
text-align:center;
color:#eac654;
font-size:25px;
}
@media screen and (max-width:1000px){
.col1, .col2 {
float:none;
width:100%;
}
}
@media screen and (max-width:600px){
.col1, .col2 {
float:none;
width:100%;
}
}
</style>
</head>
<body>
<div class="header">
<h1 style="font-size:29px; text-align:center;font-family:sans-serif">New changes public paticipation page</h1>
</div>
<span style="font-size:25px; text-align:center; color:rgb(255,20,15);font-family:serif"><?php echo $opinion; ?></span>
<div class="row">
<div class="col1">
<div class="container">
<h1 style="background:#eadc56">Find links Here</h1>
<div class="nav">
<a href="welcome.php">Home</a>
<a href="opinion.php">Referandum</a>
<div class="dropdown">
<a class="dropbut" onclick="link()" href="#">Public paticipation</a>
<div class="dropdown-content" id="show">
<a href="proje.php">Projects</a>
<a href="budget.php">Budget</a>
<a href="new.php">New-changes</a>
</div>
</div>
<a href="change.php">Change password</a>
<a href="logout.php">Logout</a>
</div>
</div>
</div>
<div class="col2">
<div class="container">
<p style="font-size:15px;font-family:Arial;text-align:center"><b>Download the new changes document below and read to make the right choice</b></p>
<p>
<a href="budget.pdf">Download pdf here</a>
</p>
<p>
<a href="budget.mp4">Download video here</a>
</p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<h3>Have read the new changes doc or watch the video? Give your opinion please.</h3> 
<div>
<input type="radio" name="opinion" value="YES, I Support the changes"/>YES, I support.<br/><br/>
</div>
<div>
<input type="radio" name="opinion" value="NO"/>NO, I don't Support the changes.<br/><br/>
<span style="color:red"><?php echo $opinion_err; ?></span>
</div>
<p>Give comment concerning your choice.<b><i>Comment is optional,can skip</i><b></p>
<input type="button" onClick="comment()" value="Comment Here"><br/><br/>
<textarea style="height:150px;width:40%" name="comment"></textarea><br/><br/>
<input type="submit" value="SEND"/>
</form>
</div>
</div>
</div>
<script>
function link(){
var links = document.getElementById("show");
if(links.style.display === "none"){
links.style.display = "block";
}
else
{
links.style.display = "none";
}
}
var hide = document.getElementById("show");
window.onclick() = function(event){
if(event.target == "hide"){
hide.style.display = "none";
}}
</script>
</body>
</html>


