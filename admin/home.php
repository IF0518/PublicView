<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
header("location: index.php");
exit();
}
?>
<DOCTYPE html>
<html>
<head>
<title>Admin home page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
background:white;
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
height:380px;
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
.header{background:#abc56e;
padding:10px;
margin:10px;
text-align:center;
color:black;
font-size:25px;
}
@media screen and (max-width:1000px){
.col1, .col2, .bod1 {
float:none;
width:100%;
}
}
@media screen and (max-width:600px){
.col1, .col2, .bod1 {
float:none;
width:100%;
}
}
</style>
</head>
<body>
<div class="bod1">
<div class="header">
<h1 style="text-align:center">Welcome Admin to publicviewKenya system</h1>
</div>
<div class="row">
<div class="col2">
<div class="container1">
<h1 style="background:#eadc56">Navigate other pages</h1>
<div class="nav">
<a href="home.php">Home</a>
<a href="closevote.php">Close Voting</a>
<div class="dropdown">
<a class="dropbut" onclick="link1()" href="#">Result</a>
<div class="dropdown-content" id="result">
<a href="referrvote.php">Referendum votes</a>
<a href = "brvote.php">Budget Votes</a>
<a href = "prvote.php">Advancements Votes</a>
</div>
</div>
<div class="dropdown">
<a class="dropbut" onclick="link()" href="#">Update</a>
<div class="dropdown-content" id="show">
<a href="referupdate.php">Referendum Update</a>
<a href="bupdate.php">Budget Update</a>
<a href="pupdate.php">Advancements Update</a>
</div>
</div>
<div class="dropdown">
<a class="dropbut" onclick="link2()" href="#">Comments</a>
<div class="dropdown-content" id="comment">
<a href="refercomment.php">Referendum comments</a>
<a href = "budcomment.php">Budget comments</a>
<a href = "procomment.php">Advancements comments</a>
</div>
</div>
<a href="statform.php">Statistics</a>
<a href="regform.php">Register_user</a>
<a href="change.php">Change password</a>
<a href="logout.php">Logout</a>
</div>
</div>
</div>
<div class="col1">
<div class="container1">
<h1 style="background:#eadcb7">Profile</h1>
<p><b>First-name:</b><i><?php echo htmlspecialchars($_SESSION["first_name"]);?></i></p>
<p><b>Last-name:</b> <i><?php echo htmlspecialchars($_SESSION["last_name"]);?></i></p>
<p><b>Tell-number:</b> <i>0<?php echo htmlspecialchars($_SESSION["phone_number"]);?></i></p>
<p><b>ID-Number:</b> <i><?php echo htmlspecialchars($_SESSION["ID_Number"]);?></i></p>
<p><b>Email:</b>    <i><?php echo htmlspecialchars($_SESSION["Email"]);?></i></p>
</div>
</div>
</div>
</div>
<script>
function link1(){
var links1 = document.getElementById("result");
if(links1.style.display === "block"){
links1.style.display = "none";
}
else
{
links1.style.display = "block";
}
}

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
function link2(){
var links1 = document.getElementById("comment");
if(links1.style.display === "block"){
links1.style.display = "none";
}
else
{
links1.style.display = "block";
}
}
</script>
</body>
</html>


