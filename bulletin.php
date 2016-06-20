<?php
require "login_checker.php";
if(isset($_SESSION["login_status"]) && isset($_SESSION["username"]) && isset($_SESSION["access_level"])){
	echo "Hello ".$_SESSION["username"]." Your logged in status is ".$_SESSION["login_status"]." and your access_level is ".$_SESSION["access_level"];
}
else{
	$redirect_pag = '/../Spider_2016_4/';
	session_unset();
	session_destroy();
	redirect($redirect_pag);
}
?>