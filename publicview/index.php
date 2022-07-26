<?php
require_once "log.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Login in publicview</title>
<meta charset="UTF-8">
<meta name="default" href="http://localhost/publicView/"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="keyword" content="publicview, publicviewkenya, views system, opinion"/>
<meta name="description" content="This is a publicview system where you can give your view or opinion concerning government projects,budget,referadums and
 other government operations"/>
<style>
body{
      background:white;
      margin:0;
      font-family:Arial;
     }
.container{
            width:60%;
            background:green;
            margin:auto;
            border:2px #aedf56;
            border-radius:2%;
text-align:center;
height:auto;
color:white;
            }
input[type=text],input[type=password]{
width:20%;
border:2px #dab679;
border-radius:10%;
color:black;
font-size:15px;
padding:15px;
margin:20px auto 20px auto;
}
label {
color:white;
}
.but{
background:#654fac;
width:20%;
color:#efa569;
margin:20px auto 19px auto;
padding:10px;
font-size:10px;
border-radius:10%;
}
@media screen and (max-width:1000px){
input[type=text],input[type=password], .but{
width:50%
}
.container{
width:95%;
}
}
@media screen and (max-width:600px){
input[type=text],input[type=password], .but{
width:50%
}
.container{
width:95%;
}
}
</style>
</head>
<body>
<div class="container">
<img src="kenya.png" style="width:200px; height:150px"/>
<h1>Welcome to publicview</h1>

<h3>Fill in the username as your national ID Number and password to login</h3>
<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
<label for="username">Username</label><br/>
<input type="text" name="username" placeholder="National id no." title="fill username"/><br/>
<span style="color:red"><?php echo $username_err ?></span><br/>
<label for="password">Password</label><br/>
<input type="password" name="password" id="show" placeholder="Fill password" title="fill password"/><br/>
<span style="color:red"><?php echo $password_err ?></span><br/>
<input type="checkbox" value="show password" onclick="showPass()">view password
<div class="but"> 
<input type="submit" value="Login">
</div>
<p>Have not set a password,<a style="text-decoration:none; color:red" href="set.php">Set password here</a></p>
<a style="text-decoration:none; margin:20px; color:red" href="forgot.php">Forgot password</a>
</form>
</div>
<script>
function showPass(){
var x = document.getElementById("show");
if(x.type === "password"){
x.type = "text";
}else{
x.type = "password";
}
}
</script>
</body>
</html>
