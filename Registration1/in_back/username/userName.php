<?php
	$userName = $errorUserName = "";
	
	function checkUserName($x){
		$i = strlen($x);
		if(!(($x[$i-1] >= 'a' and $x[$i-1] <= 'z') || ($x[$i-1] >= 'A' and $x[$i-1] <= 'Z') || ($x[$i-1] >= '0' and $x[$i-1] <= '9'))){
			return false;
		}
		
		$i = 0;
		if(!(($x[$i] >= 'a' and $x[$i] <= 'z') || ($x[$i] >= 'A' and $x[$i] <= 'Z'))){
			return false;
		}
		
		for($i = 0; $i < strlen($x); $i++){
			if(!(($x[$i] >= 'a' and $x[$i] <= 'z') || ($x[$i] >= 'A' and $x[$i] <= 'Z') || ($x[$i] >= '0' and $x[$i] <= '9') || $x[$i] == '.' || $x[$i] == '_')){
				return false;
			}
		}
		
		return true;
	}

	if(isset($_REQUEST['userName']) and !empty($_REQUEST['userName'])){
		$name = trim($_REQUEST['userName']);
		
		if(strlen($name) < 5 || !checkUserName($name)){
			$errorUserName = "* Invalid username.";
		}
		
		else{
			$userName = $name;
		}
	}
	
	else if($_SERVER["REQUEST_METHOD"] == "POST"){
		$errorUserName = "* Please enter username.";
	}
?>