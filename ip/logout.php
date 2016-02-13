<?php
	require 'core.php';
	setcookie("user_name", $_COOKIE['user_name'], time()-3600);
	setcookie("user_id",$_COOKIE['user_id'],time()-3600);
	session_destroy();
	header('Location:http://localhost/ip/signin.php');
?>