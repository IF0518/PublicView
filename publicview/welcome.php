<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome to public view</title>
<meta charset="UTF_8">
<link rel="manifest"  href="PV.json">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{
background:green;
font-family:calibri;
margin:0
}
.row {margin:5px;}
.row:after{
content:"";
display:table;
clear:both;
}
.col1{
float:left;
width:60%;
padding:10px;
}
.col2{
float:left;
width:25%;
padding:10px;
}
.container1{
background:#fff;
border:2px solid #eadb67;
padding:15px;
margin-top:10px;
height:auto;
}

.nav {
background:#facb67;
overflow:hidden;
}
.nav a{
font-size:18px;
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
.active, .dropdown:hover .dropbut{
background:#eadcb4;
}
.dropdown-content{
position:absolute;
display:none;
max-width:200px;
z-index:1;
background:rgb(230,109,190);
}

.dropdown:hover .dropdown-content{
display:block;
}
.bod1{
border: 2px solid yellow;
margin:10px;
background:green;
}
.dropdown-content a{
text-align:left;
color:blue;
font-size:15px;
display:block;
padding:8px;
}
.header1{background:white;
padding:10px;
margin:10px;
text-align:center;
color:#eac654;
font-size:25px;
width:85%;
}

@media screen and (max-width:1000px){
.col1, .col2, .bod1 {
float:none;
width:100%;
}
.col2{
display:none;
}
.header1{
display:none;
}
.header{background:white;
padding:10px;
margin:10px;
text-align:center;
color:#eac654;
font-size:25px;
width:85%;
}
.drop{
border:none;
outline:none;
font-size:30px;
color:blue;
background:#facb67;
right:0px;
float:right;
cursor:pointer;
transition:0.4s;
}
.activer1,.drop:hover{
background:white;
}
.dropdown{
display:none;
max-width:200px;
overflow:hidden;
background:#aedc72;
}
.dropdown a{ 
text-decoration:none;
color:blue;
font-size:21px;
text-align:left;margin:3px;
display:block;
}

.accor{
border:none;
outline:none;
cursor:pointer;
transition:0.4s;
font-size:21px;
text-align:left;
display:block;
margin:3px;
color:blue;
}
.active, .accor:hover{
color:green;
}
.panel{
display:none;
overflow:hidden;
}
}
@media screen and (max-width:600px){
.col1, .col2, .bod1 {
float:none;
width:100%;
}
.col2{
display:none;
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
<div class="bod1">
<div class="header">
<button class="drop">Vote Here</button>
<div class="dropdown">
<a href="opinion.php">Referandum</a>
<button class="accor">Public participation</button>
<div class="panel">
<a href="budget.php">National Budget</a>
<a href="proje.php">Other Operations</a>
</div>
<a href="welcome.php">Profile</a>
<a href="change.php">Change password</a>

<a href="logout.php">Logout</a>
</div>
<h1 style="text-align:left; font-size:20px; color:black">Your System_Id: <?php echo htmlspecialchars($_SESSION["System_id"]); ?></h1>
<h2 style="text-align:center">Welcome <b><i><?php echo htmlspecialchars($_SESSION["Firstname"]);?></i></b> to publicviewKenya system</h2>
</div>
<div class="header1">
<h1 style="text-align:left; font-size:20px; color:black">Your System_Id: <?php echo htmlspecialchars($_SESSION["System_id"]); ?></h1>
<h2 style="text-align:center">Welcome <b><i><?php echo htmlspecialchars($_SESSION["Firstname"]);?></i></b> to publicviewKenya system</h2>
</div>

<div class="row">
<div class="col2">
<div class="container1">
<h1 style="background:#eadc56">Find links Here</h1>
<div class="nav">
<a href="welcome.php">Home</a>
<a href="opinion.php">Referandum</a>
<div class="dropdown">
<button class="dropbut">Public paticipation</button>
<div class="dropdown-content">
<a href="budget.php">National Budget</a>
<a href="proje.php">Other operations</a>
</div>
</div>
<a href="change.php">Change password</a>
<a href="logout.php">Logout</a>
</div>
</div>
</div>
<div class="col1">
<div class="container1">
<h1 style="background:#eadcb7">Profile</h1>
<p><b>Id-Number:</b> <i><?php echo htmlspecialchars($_SESSION["Id_number"]);?></i></p>
<p><b>First-name:</b><i><?php echo htmlspecialchars($_SESSION["Firstname"]);?></i></p>
<p><b>Last-name:</b> <i><?php echo htmlspecialchars($_SESSION["Lastname"]);?></i></p>
<p><b>Tell NUMB:</b> <i>0<?php echo htmlspecialchars($_SESSION["Tell_number"]);?></i></p>
<p><b>County:</b>    <i><?php echo htmlspecialchars($_SESSION["County"]);?></i></p>
</div>
</div>
</div>
</div>
<script>
var but = document.getElementsByClassName("drop");
var n;
for(n=0; n<but.length; n++){

but[n].addEventListener("click",function(){

this.classList.toggle("active1");
var dropdown = this.nextElementSibling;
if(dropdown.style.display === "block"){
dropdown.style.display = "none";
}
else
{
dropdown.style.display = "block";
}
});
}

var acc=document.getElementsByClassName("accor");
var i;
for(i=0; i<acc.length; i++){
acc[i].addEventListener("click",function(){

this.classList.toggle("active");

var panel=this.nextElementSibling;

if(panel.style.display==="block"){
panel.style.display="none";
}else{
panel.style.display="block"
}
});
}
</script>
</body>
</html>


