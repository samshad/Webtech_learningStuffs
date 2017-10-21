<?php
	$pass = $errorPass1 = $errorPass2 = "";
	
	if(isset($_REQUEST['pass1']) and !empty($_REQUEST['pass1'] and isset($_REQUEST['pass2']) and !empty($_REQUEST['pass2']))){
		$pass1 = $_REQUEST['pass1'];
		$pass2 = $_REQUEST['pass2'];
		
		function checkPass($pass){
			for($i = 0; $i < strlen($pass); $i++){
				if($pass[$i] == '@' or $pass[$i]  == '#' or $pass[$i]  == '$' or $pass[$i]  == '%'){
					return true;
				}
			}
			return false;
		}
		
		if(strlen($pass1) < 6) $errorPass1 = "* Invalid Password.";
		else if(!checkPass($pass1)) $errorPass1 = "* Invalid Password.";
		else{
			if($pass2 != $pass1){
				$errorPass2 = "* Passwords didn't matched.";
			}
			
			else{
				$pass = $pass1;
			}
		}
	}
	
	else if($_SERVER['REQUEST_METHOD'] == "POST"){
		$errorPass1 = $errorPass2 = "* Passwords required.";
	}//1234567@
?>