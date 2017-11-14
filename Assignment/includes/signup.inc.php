<?php
	include_once "session.inc.php";
	
	if(isset($_POST['submit'])){
		$userName = trim($_POST['username']);
		$pass1 = $_POST['password1'];
		$pass2 = $_POST['password2'];
		
		if(empty($userName) or empty($pass1) or empty($pass2)){
			header("Location: /SRU/Assignment/signup.php?signup=empty");
			exit();
		}
		else{
			$txt = $userName . "," . $pass1 . "\r\n";
			
			$file = fopen("../users.txt", "a");
			
			fwrite($file, $txt);
			fclose($file);
			header("Location: /SRU/Assignment/login.php");
			exit();
		}
	}
	else{
		header("Location: /SRU/Assignment/index.php");
		exit();
	}