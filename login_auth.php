<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Member Login Status</title>
</head>
<body>
<?php
	require "connect.php";
	
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	$message = "Hello";

	if(isset($_SESSION['login_status']) && $_SESSION['login_status'] == true){
		echo "You have already logged in another tab";
		header("Location: /Spider_2016_4/bulletin.php");
		die("Already logged in ");
	}

	function validateInp($n,$p){
		global $message;

		//Check name
		if(!strcmp($n,'')){
			$message = 'Username must not be empty';
			return false;
		}
		//Check password
		if(!strcmp($p,'')){
			$message = 'Password must not be empty';
			return false;
		}
		return true;
	}
	if(!(isset($_POST["user_name"]) && isset($_POST["password"]))){
		$message = "Please fill the login details";
		echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/';</script>";
	}
	$user_name = $_POST["user_name"];//"aaa";
	$user_pass = $_POST["password"];

	$_SESSION['login_status'] = false;
	$_SESSION['username'] = $user_name;
	
	if(validateInp($user_name,$user_pass)){
		$sql = $conn->prepare("SELECT Password,Access FROM spider_2016_4 where Username = ?");
		$sql->bind_param("s",$user_name);
		$sql->execute();
		$sql->bind_result($passInTab,$access);
		$sql->store_result();
		
		if($sql->num_rows == 0){
			echo "It seems you haven't registered yet";
			$message = "It seems you have not registered yet";
			session_unset();
			session_destroy();
			echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/register.php';</script>";
			ob_end_flush();
			//header('Location: /../Spider_2016_4/register.php');
		} else {
			while($sql->fetch()){
				//do nothing
			}
			//echo "Entered password is ".$user_pass;
			//echo "Password in DB is ".$passInTab;
			if(!strcmp($user_pass,$passInTab)){
				echo "Logged in Successfully!!";
				$_SESSION['login_status'] = true;
				$_SESSION['access_level'] = $access;
				header('Location: /../Spider_2016_4/bulletin.php');
				ob_end_flush();
			} else {
				echo "Incorrect password for the given username";
				$message = "Incorrect password for the given username";
				session_unset();
				session_destroy();
				echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/';</script>";
				ob_end_flush();
				//header('Location: /../Spider_2016_4/');
			}
		}
		$sql->close();
		$conn->close();
	}
	else{
		session_unset();
		session_destroy();
		echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/';</script>";
		ob_end_flush();
	}
?>
</body>
</html>