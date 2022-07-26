<?php
require_once "create.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Create password</title>
<meta charset="UTF-8">
<link  rel="manifest"  href="PV.json">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{
background:#aed69c;
margin:10px;
font-family:Arial;
}
.container{
background:white;
margin:auto;
text-align:center;
width:80%;
height:auto;
border:3px solid #34eadc;
border-radius:5%;
color:#bc2765;
}
input[type=text], input[type=password]{
margin:20px auto 19px auto;
font-size:15px;
padding:15px;
background:#cdf458;
color:black;
width:30%;
border:2px solid #ebca43;
border-radius:50px;
}
.but{
background:#76faec;
margin:20px auto 19px auto;
color:#ead654;
padding:15px;
border:2px solid #fbaced;
border-radius:30px;
font-size:25px;
width:30%;

}
label{
font-size:25px;
color:brown;
} 
@media screen and (max-width:1000px){
.but{
width:50%;
}
}
@media screen and (max-width:600px){
.but{
width:50%;
}
}
</style>
</head>
<body>

<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<h1>Set your password for publicviewkenya system</h1>
<h3>Fill in the field for National id no. and password fields to set a secret password to login in.</h3>
<div>
<span style="color:red"><?php echo $system_err; ?></span><br/>
<label for="national id">National id</label><br/>
<input type="text" name="username" placeholder="National id" id="uname"/><br/>
<span style="color:red"><?php echo $username_err; ?></span>
</div>
<div>
<label for="password">Password</label><br/>
<input type="password" name="password" placeholder="fill password" id="pass"/><br/>
<span style="color:red"><?php echo $password_err; ?></span>
</div>
<div>
<label for="Confirm-assword">Confirm-password</label><br/>
<input type="password" name="confirm" placeholder="confirm-password" id="cpass"/><br/>
<span style="color:red"><?php echo $confirm_err; ?></span>
</div>
<div class="but">
<input type="submit" value="Set password"><br/><input type="reset" value="Reset">
</div>
</form>
</div>
</body>
</html>


