<?php
require_once "statistic.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Statistics of votes</title>
<style>
.container{
margin:auto;
background:#bacd48;
text-align:center;
width:70%;
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
input[type=text]{
font-size:23px;
padding:12px;
width:50%;
border:2px solid #afc582;
border-radius:20px;
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
<h1>Keep Record of votes from any of the events</h1>
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
<a href="creapdf.php">Down comments</a>
<a href="logout.php">Logout</a>
</div>
</div>
<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
<label for = "Record_id">Record_id</label><br/>
<input type="text" name="record_id" placeholder="record_id"/><br/>
<label for = "Activity">Activity</label><br/>
<input type = "text" name="activity" placeholder="Activity"/><br/>
<label for="Event_date">Event_date</label><br/>
<input type="text" name="event_date" placeholder="Event_date"/><br/>
<label for="option_Yes_total">Yes_Vote_total</label><br/>
<input type="text" name="yes_total" placeholder="Yes_Vote_total"/><br/>
<label for="No_Vote_total">No_Vote_total</label><br/>
<input type="text" name="no_total" placeholder="No_Vote_total"/><br/>
<label for="Remarks">Remarks</label><br/><br/>
<textarea name="remarks" style="width:50%;height:100px"></textarea><br/><br/>
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

