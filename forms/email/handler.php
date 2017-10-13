<?php
	var_dump($_REQUEST);
	echo "<br><br>";

	function checkString($x, $y){
		$f = true;
		
		for($i = 0; $i < strlen($x); $i++){
			if($y == 1){
				if(!(($x[$i] >= 'a' and $x[$i] <= 'z') || ($x[$i] >= 'A' and $x[$i] <= 'Z') || ($x[$i] >= '0' and $x[$i] <= '9') || $x[$i] == '.' || $x[$i] == '_' || $x[$i] == '-')){
					$f = false;
					break;
				}
			}
			
			else{
				if(!(($x[$i] >= 'a' and $x[$i] <= 'z') || ($x[$i] >= 'A' and $x[$i] <= 'Z'))){
					$f = false;
					break;
				}
			}
		}
		
		return $f;
	}
	
	if(isset($_REQUEST['email']) && !empty($_REQUEST['email'])){
		$mail = $_REQUEST['email'];
		
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
		
		//echo "1: " . $f;
		
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
		
		//echo "<br>2: " . $f;
		//echo "<br> A: $a <br> B: $b <br> C: $c <br>";
		
		if(!checkString($a, 1) or !checkString($b, 2) or !checkString($c, 3)) $f = false;
		
		//echo "<br>3: " . $f . "<br>";
		
		if(!$f){
			echo "Insert the email address correctly.";
			require "email.html";
		}
		
		else{
			echo "Email: " . $mail;
		}
	}
	
	else{
		echo "Fill all the fields.";
		require "email.html";
	}
?>