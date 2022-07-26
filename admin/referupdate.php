<?php
require_once "referupvote.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Update the Database</title>
<style>
body{
background:limegreen;
font-family:Arial;
margin:10px;
}
.container{
background:#bcd;
text-align:center;
margin:auto;
width:65%;
color:black;
font-size:20px;
margin-bottom:15px;
}
input[type=text]{
padding:12px;
margin:10px;
width:50%;
border:2px solid #eacf78;
border-radius:20px;
display:none;
}
input[type=submit]{
padding:12px;
margin:10px;
text-align:center;
float:center;
width:50%;
border:2px solid #eacf78;
border-radius:20px;
background:lightblue;
font-weight:0.8;
}
.header{
color:#bea7cd;
background:#fff;
font-size:29px;
padding:20px;
text-align:center;
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

.dropdown-content a{
text-align:left;
color:blue;
font-size:15px;
display:block;
padding:8px;
}
.container1{
background:#fff;
padding:15px;
margin-top:10px;
height:auto;
margin:auto;
width:50%;
}
@media screen and (max-width:1000px){
.container, .container1 {
width:100%;
}
}
@media screen and (max-width:600px){
.container, .container1 {
width:100%;
}
}

</style>
</head>
<body>
<div class="header">
<h1>Updating referendum previous votes</h1>
</div>
<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validate()">
<h2>Want to update previous referendum votes</h2>
<input type="text" name="opinion" id="op"/><br/>
<input type="text" name="comment" id="com"/><br/>
<input type="submit" value="UPDATE PRE REF VOTES"/>
</form>
</div>
<div class="container1">
<h1 style="background:#eadc56">Navigate to other pages</h1>
<div class="nav">
<a href="home.php">Home</a>
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
<a href="adminregister.php">Change password</a>
<a href="logout.php">Logout</a>
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
var hide = document.getElementById("show");
window.onclick() = function(event){
if(event.target == "hide"){
hide.style.display = "none";
}}
function validate(){
var sub = confirm("Are you sure you want to update the data");
if(sub == true){
document.getElementById("op").value = "NULL";
document.getElementById("com").value = "NULL";
document.getElementById("close").value="Open";
return true;
}else
{
return false;
}
}
</script>
</body>
</html>
