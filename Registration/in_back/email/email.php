<?php
	$email = $errorEmail = "";

	function checkString($x, $y){
		$i = strlen($x);
		if(!(($x[$i-1] >= 'a' and $x[$i-1] <= 'z') || ($x[$i-1] >= 'A' and $x[$i-1] <= 'Z') || ($x[$i-1] >= '0' and $x[$i-1] <= '9')) and $y == 1){
			return false;
		}
		
		if(!(($x[0] >= 'a' and $x[0] <= 'z') || ($x[0] >= 'A' and $x[0] <= 'Z'))){
			return false;
		}
		
		for($i = 0; $i < strlen($x); $i++){
			if($y == 1){
				if(!(($x[$i] >= 'a' and $x[$i] <= 'z') || ($x[$i] >= 'A' and $x[$i] <= 'Z') || ($x[$i] >= '0' and $x[$i] <= '9') || $x[$i] == '.' || $x[$i] == '_' || $x[$i] == '-')){
					return false;
				}
			}
			
			else{
				if(!(($x[$i] >= 'a' and $x[$i] <= 'z') || ($x[$i] >= 'A' and $x[$i] <= 'Z'))){
					return false;
				}
			}
		}
		
		return true;
	}
	
	if(isset($_REQUEST['email']) and !empty($_REQUEST['email'])){
		$mail = trim($_REQUEST['email']);
		
		$at = 0;
		$cnt = 0;
		$f = true;
		
		for($i = 0; $i < strlen($mail); $i++){
			if($mail[$i] == '@'){
				$cnt++;
				$at = $i;
			}
		}
		
		if($cnt > 1) $f = false;
		
		$a = null;
		$b = null;
		$c = null;
		
		$i = 0;
		
		while($i < strlen($mail) and $i < $at) $a .= $mail[$i++];
		
		$i++;
		
		while($i < strlen($mail) and $mail[$i] != '.') $b .= $mail[$i++];
		
		$i++;
		
		while($i < strlen($mail)) $c .= $mail[$i++];
		
		if(empty($a) or empty($b) or empty($c)) $f = false;
		
		if(!checkString($a, 1) or !checkString($b, 2) or !checkString($c, 3)) $f = false;
		
		if(!$f){
			$errorEmail = "* Invalid email address.";
		}
		
		else{
			$email = $mail;
		}
	}
	
	else if($_SERVER["REQUEST_METHOD"] == "POST"){
		$errorEmail = "* Please enter email address.";
	}
?>