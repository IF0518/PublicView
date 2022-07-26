<?php
require_once "adminlogin.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login to public view</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device width, initial-scale=1.0">
<meta name="keyword" content="publicview, publicviewkenya, views system, opinion">
<meta name="description" content="This is a publicview system where you can give your view or opinion concerning government projects,budget,referadums and
 other government operations">
<style>
body{
      background:#fff;
      margin:0;
      font-family:Arial;
     }
.container{
            width:80%;
            background:#acfbe6;
            margin:auto;
            border:2px #aedf56;
            border-radius:2%;
text-align:center;
height:auto;
color:#326ace;
            }
input[type=text],input[type=password]{
width:20%;
border:2px #dab679;
border-radius:10%;
color:#f56dae;
font-size:15px;
padding:16px;
margin:20px auto 20px auto;
}
label {
color:#1e4523;
}
.but{
background:#654fac;
width:20%;
color:#efa569;
margin:20px auto 19px auto;
padding:16px;
font-size:15px;
border-radius:10%;
}
</style>
</head>
<body>
<div class="container">
<h1>Welcome to publicview</h1>
<h3>Fill in the Admin username  and Admin password to login</h3>
<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
<label for="username">Username</label><br/>
<input type="text" name="adminname" placeholder="Admin id no." title="fill username"/><br/>
<span style="color:red"><?php echo $username_err ?></span><br/>
<label for="password">Password</label><br/>
<input type="password" name="password" id="show" placeholder="Fill password" title="fill password"/><br/>
<span style="color:red"><?php echo $password_err ?></span><br/>
<input type="checkbox" value="show password" onclick="showPass()">view password
<div class="but"> 
<input type="submit" value="Login">
</div>
<p>Are you new or have not set a password,<a style="text-decoration:none; color:red" href="adminregister.php">Set password here</a></p>
<a style="text-decoration:none; margin:20px; color:red" href="adminregister.php">Forgot password</a>
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