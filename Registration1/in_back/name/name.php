<?php
	$firstName = $lastName = $errorName = "";
	
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
	
	if(isset($_REQUEST['firstName']) and isset($_REQUEST['lastName']) and $_SERVER["REQUEST_METHOD"] == "POST"){
		$first = trim($_REQUEST['firstName']);
		$last = trim($_REQUEST['lastName']);
		
		if(empty($first) or empty($last)){
			$errorName = "* Names are required.";
		}
		
		else{
			if(!checkName($first) or !checkName($last)){
				$errorName = "* Invalid name.";
			}
			
			else{
				$firstName = $first;
				$lastName = $last;
			}
		}
	}
?>