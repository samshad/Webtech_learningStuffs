<?php
	include_once "session.inc.php";

	if(isset($_POST['submit'])){
		$userName = $_POST['username'];
		$pass = $_POST['password'];
		
		if(empty($userName) or empty($pass)){
			header("Location: /SRU/Assignment/login.php?login=empty");
			exit();
		}
		else{
			$file = fopen("../users.txt", "r");
			$users = array();
			
			while(!feof($file)){
				$in = fgets($file);
				$in = trim($in);
				
				$arr = explode(",", $in);
				if(count($arr) == 2){
					$n = $arr[0];
					$p = $arr[1];
					
					$users[count($users)] = array($n,$p);
					//var_dump($users);
				}
			}
			
			fclose($file);
			
			foreach($users as $i){
				if($i[0] == $userName){
					if($i[1] == $pass){
						$_SESSION['currUser'] = array('userName'=>$userName, 'password'=>$pass);
						header("Location: /SRU/Assignment/index.php");
						exit();
					}
				}
			}
			
			header("Location: /SRU/Assignment/login.php?login=failed");
			exit();
		}
	}
	else{
		header("Location: /SRU/Assignment/index.php");
		exit();
	}