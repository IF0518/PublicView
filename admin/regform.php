<?php
require_once "register.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Registering users</title>
<style>
.container{
margin:auto;
background:#bacd48;
text-align:center;
width:80%;
height:auto;
padding:15px;
margin-top:15px;
}
.header{
background:#ead583;
padding:15px;
font-size:15px;
font-family:serif;
text-align:center;
margin-bottom:15px;
}
input[type=text], input[type=password], input[type=submit]{
font-size:18px;
padding:8px;
width:45%;
border:2px solid #afc582;
border-radius:20px;
}
input[type=submit]{
width:20%;
}
.nav {
background:#facb67;
overflow:hidden;
}
.nav a{
font-size:20px;
text-align:center;
display:block;
padding:18px;
color:blue;
float:left;
text-decoration:none;
}
.dropdowm{
overflow:hidden;
position:relative;
}
.dropdown .dropbut{
float:left;
text-align:center;
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
margin-top:40px;
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
</style>
</head>
<body>
<div class="header">
<h1>Register user into the system</h1>
</div>
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
<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
<label for = "Record_id">National_id</label><br/>
<input type="text" name="record_id" placeholder="national_id"/><br/>
<label for = "Activity">Firstname</label><br/>
<input type = "text" name="activity" placeholder="firstname"/><br/>
<label for="Event_date">Lastname</label><br/>
<input type="text" name="event_date" placeholder="lastname"/><br/>
<label for="option_Yes_total">Tell_number</label><br/>
<input type="text" name="yes_total" placeholder="Tell_number"/><br/>
<label for="No_Vote_total">County</label><br/>
<input type="text" name="no_total" placeholder="Your county"/><br/>
<label for="Remarks">password</label><br/><br/>
<input type="password" name = "password" placeholder = "password"/><br/>
<input type ="submit" value="SUBMIT">
</form>
</div>
<script>
function link1(){
var links1 = document.getElementById("result");
if(links1.style.display === "none"){
links1.style.display = "block";
}
else
{
links1.style.display = "none";
}
}

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
function link2(){
var links1 = document.getElementById("comment");
if(links1.style.display === "none"){
links1.style.display = "block";
}
else
{
links1.style.display = "none";
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

