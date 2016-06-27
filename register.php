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
	<link rel="stylesheet" type="text/css" href="register.css">
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
		
		<center><p><img id="captcha" src="/../Spider_2016_4/captcha.php" width="160" height="45" border="1" alt="CAPTCHA"></center>
		<center><small><a href="#" onclick="
		document.getElementById('captcha').src = '/../Spider_2016_4/captcha.php?' + Math.random();
		document.getElementById('captcha_code').value = '';
		return false;
		">refresh</a></small></p></center>
		<p><input id="captcha_code" type="text" name="captcha_code" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');">
		<center><small>Copy the digits from the image into this box</small></p></center>
		
		<button id="reg" onclick="return btnClick()">Register</button>
		<center><div id="register">Login <a href="index.php">HERE</a></div></center>
	</form>
</div>
<script src="register.js" type='text/javascript'>
</script>
</body>
</html>