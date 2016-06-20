<?php
session_start();
$redirect_page = '/../Spider_2016_4/bulletin.php';
if(isset($_SESSION['login_status']) && $_SESSION['login_status']){
	header('Location: '.$redirect_page);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Member Registration Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div id="login">
	<form action = "register_auth.php" method="POST">
		<header>Member Registration</header>
		<label>Username</label>
		<input required name = "user_name" id="user_name"/>
		<label>Password</label>
		<input type="password" required name = "password" id="password"/>
		<label>Confirm Password</label>
		<input type="password" required name = "confirm" id="confirm"/>
		<button id="reg" onclick="return btnClick()">Register</button>
		<center><div id="register">Login <a href="index.php">HERE</a></div></center>
	</form>
</div>
<script src="register.js" type='text/javascript'>
</script>
</body>
</html>