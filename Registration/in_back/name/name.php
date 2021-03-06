<?php
	$Name = $errorName = "";

	function checkName($name){
		if(!(($name[0] >= 'a' and $name[0] <= 'z') || ($name[0] >= 'A' and $name[0] <= 'Z'))){
			return false;
		}

		$i = strlen($name);
		if(!(($name[$i-1] >= 'a' and $name[$i-1] <= 'z') || ($name[$i-1] >= 'A' and $name[$i-1] <= 'Z'))){
			return false;
		}

		for($i = 0; $i < strlen($name); $i++){
			if(!(($name[$i] >= 'a' and $name[$i] <= 'z') || ($name[$i] >= 'A' and $name[$i] <= 'Z') || $name[$i] == '.' || $name[$i] == '-' || $name[$i] == ' ')){
				return false;
			}
		}

		return true;
	}

	if(isset($_REQUEST['name']) and $_SERVER["REQUEST_METHOD"] == "POST"){
		$name = trim($_REQUEST['name']);

		if(empty($first) or empty($last)){
			$errorName = "* Names are required.";
		}

		else{
			if(!checkName($name)){
				$errorName = "* Invalid name.";
			}

			else{
				$Name = $name;

			}
		}
	}
?>
