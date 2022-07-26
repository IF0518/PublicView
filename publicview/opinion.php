<?php
require_once "opin.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Give your opinion</title>
<meta charset="UTF-8">
<link ref="manifest"  href="PV.json">
<meta name="viewport" content="width=device-width, initial scale=1">
<style>
body{
font-family:serif;
background:green;
margin:20px;
}
input[type = radio]{
font-size:30px;
margin:10px;
}
input[type = submit]{
font-size:25px;
background:#c72bdf;
color:black;
border:2px solid #d93bae;
border-radius:20px;
padding:12px;
margin:12px;
}
.container{
background:white;
margin:10px;
height:auto;
border:2px solid black;
} 
.row{margin:20px;}
.col1{
width:20%;
float:left;
background:#ead68c;
}
.col2{width:75%;
float:left;
background:#ba83ce;
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
background:#fab869;
}
.dropdown-content a{
text-align:left;
color:blue;
font-size:15px;
display:block;
padding:8px;
}
.header{background:#afe;
padding:10px;
margin:10px;
text-align:center;
color:black;
font-size:25px;
}
.sum{
border:none;
outline:none;
cursor:pointer;
background:#edf;
transition:0.4s;
left:2px;
font-size:20px;
text-align:left;
}
.active,.sum:hover{
color:blue;
background:white;
}
.panel1{
display:none;
overflow:hidden;
background:green;
color:white;
font-size:20px;
}
@media screen and (max-width:1000px){
.col1, .col2 {
float:none;
width:100%;
}
.col1{
display:none;
}
.header1{
display:none;
}
.header{background:white;
padding:10px;
text-align:center;
color:black;
font-size:25px;
width:100%;
}
.close{
border:none;
outline:none;
left:2px;
background:#fec;
margin:15px;
transition:0.4s;
cursor:pointer;
}
.active,.close:hover{
color:black;
}
.dropdowm1{
overflow:hidden;
position:relative;
}
.dropdown1 .dropbut1{
border:none;
outline:none;
font-size:30px;
color:blue;
background:#facb67;
right:0px;
float:right;
}
.active, .dropdown1:hover .dropbut1{
background:#eadcb4;
}
.dropdown-content1{
position:absolute;
display:none;
max-width:200px;
z-index:1;
background:rgb(230,109,190);
}
.dropdown-content1 a{
font-size:21px;
text-align:left;
display:block;
margin:3px;
color:blue;
text-decoration:none;
}
}
}
@media screen and (max-width:600px){
.col1, .col2 {
float:none;
width:100%;
}
}
@media screen and (min-width:4000px){
.header {
display:none;
}
}
@media screen and (min-width:1000px){
.header {
display:none;
}
}
</style>
</head>
<body>
<div class="header">
<div class="dropdown1">
<button class="dropbut1" onclick="link1()">Links</button>
<div class="dropdown-content1" id="show1">
<a href="welcome.php">Home</a>
<a href="opinion.php">Referandum</a>
<a href="budget.php">Budget</a>
<a href="proje.php">General</a>
<a href="change.php">Change password</a>

<a href="logout.php">Logout</a>
</div>
</div>
<h1 style="font-size:29px; text-align:center; font-family:serif">Referendum vote</h1>
</div>
<div class="header1">
<h1 style="font-size:29px; text-align:center; font-family:serif">Referendum vote</h1>
</div>
<span style="font-size:25px; text-align:center; color:white; font-family:serif; opacity:0.8"><?php echo $opinion; ?></span>
<span style="color:red; font-size:25px"><?php echo $opinion_err; ?></span>
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
<a href="budget.php">Budget</a>
<a href="proje.php">General</a>
</div>
</div>
<a href="change.php">Change password</a>
<a href="logout.php">Logout</a>
</div>
</div>
</div>
<div class="col2">
<div class="container">
<p style="font-size:18px; text-align:center;font-family:Arial"><b>Give your opinion, Yes For Support, No for oppose</b></p>
<button class="sum">Summary of referandum bill<b>(Click to View/Close)</b></button>
<div class="panel1">
<ul>
<li>Increase Funds to county from 15% to 35%.</li>
<li>Appoint county minister from MCAs.</li>
<li>Create position for opposition leader.</li>
<li>Create sit for prime minister.</li>
<li>Provide ward development fund.</li>
<li>Women rep to be elected to senate assembly.</li>
</ul>
</div>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<h3>Give your option.</h3> 
<div>
<input type="radio" name="opinion" value="YES"/><b>YES</b>, I  Support.<br/><br/>
</div>
<div>
<input type="radio" name="opinion" value="NO"/><b>NO</b>, I oppose.<br/><br/>
</div>
<p>Give comment concerning your choice.<b><i>Comment is optional,can skip</i><b></p>

<textarea style="height:100px;width:50%" name="comment"></textarea><br/>
<input type="submit" value="SEND"/>
</form>
</div>
</div>
</div>
<script>
function link(){
var links = document.getElementById("show");
if(links.style.display === "block"){
links.style.display = "none";
}
else
{
links.style.display = "block";
}
}
function link1(){
var links = document.getElementById("show1");
if(links.style.display === "block"){
links.style.display = "none";
}
else
{
links.style.display = "block";
}
}

var sum=document.getElementsByClassName("sum");
var i;

for(i=0; i<sum.length; i++){
sum[i].addEventListener("click",function(){

this.classList.toggle("active");

var panel1=this.nextElementSibling;
if(panel1.style.display==="block"){
panel1.style.display="none";
}else{
panel1.style.display="block";
}
});
}
</script>
</body>
</html>





