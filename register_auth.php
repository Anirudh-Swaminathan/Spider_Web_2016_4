<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Status</title>
</head>
<body>
<?php
	require "connect.php";
	
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	$message = "Hello";

	function validateInp($n,$p,$c){
		global $message;
		if(!strcmp($n,'')){
			$message = 'Username must not be empty';
			return false;
		}
		if(strlen(trim($n)) == 0){
			$message = 'Username must contain atleast 1 non-whitespace character';
			return false;
		}
		if(!strcmp($p,'')){
			$message = 'Password must not be empty';
			return false;
		}
		if(strlen(trim($p)) == 0){
			$message = 'Password must contain atleast 1 non-whitespace character';
			return false;
		}
		if(!strcmp($c,'')){
			$message = 'Confirm Password must not be empty';
			return false;
		}
		if(strcmp($p,$c)){
			$message = 'Confirm Password must be the same as that of the Password';
			return false;
		}
		return true;
	}
	
	if(!(isset($_POST["user_name"]) && isset($_POST["password"]) && isset($_POST["confirm"]))){
		$message = "Please fill the registration details";
		echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/register.php';</script>";
	}
	
	$user_name = $_POST["user_name"];//"aaa";
	$user_pass = $_POST["password"];
	$conf_pass = $_POST["confirm"];
	$access = "Viewer";
	
	if(validateInp($user_name,$user_pass,$conf_pass)){
		$sql = $conn->prepare("insert into spider_2016_4(Username,Password,Access) values(?,?,?)");
		$sql->bind_param("sss",$user_name,$user_pass,$access);
		$bo = $sql->execute();
		
		if($bo){
			echo "New Member Registered successfully";
			$message = "New Member Registered successfully";
			echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/';</script>";
		}
		else{
			echo "Registration unsuccessful!!";
			$message = "Registration unsuccessful!!";
			echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/register.php';</script>";
		}
		$sql->close();
		$conn->close();
	}
	else{
		echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/register.php';</script>";
		ob_end_flush();
	}
?>
</body>
</html>