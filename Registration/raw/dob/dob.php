<?php
	$day = $month = $year = $errorDob = "";
	
	function check($x){
		for($i = 0; $i < strlen($x); $i++){
			if(!($x[$i] >= '0' and $x[$i] <= '9')){
				return false;
			}
		}
		
		return true;
	}
	
	if(isset($_REQUEST['day']) && isset($_REQUEST['month']) && isset($_REQUEST['year']) && !empty($_REQUEST['day']) && !empty($_REQUEST['month']) && !empty($_REQUEST['year'])){
		$d = trim($_REQUEST['day']);
		$m = trim($_REQUEST['month']);
		$y = trim($_REQUEST['year']);
		
		if(!check($d) or !check($m) or !check($y)){
			$errorDob = "* Please insert your real date of birth.";
		}
		
		else{
			$fd = true;
			$fm = true;
			$fy = true;
			$leap = ((!($y % 4) && ($y % 100)) || !($y % 400)) ? 1 : 0;
			
			if(!($d >= 1 and $d <= 31)){
				$fd = false;
			}
			if(!($m >= 1 and $m <= 12)){
				$fd = false;
			}
			if($y < 1800 or ($y >= date("Y"))){
				$fy = false;
			}
			if($m == 2){
				if(!$leap and $d >= 29){
					$fd = false;
				}
				else{
					if($d > 29){
						$fd = false;
					}
				}
			}
			
			if(!$fd or !$fm or !$fy){
				$errorDob = "* Please insert your real date of birth.";
			}
			
			else{
				$day = $d;
				$month = $m;
				$year = $y;
			}
		}
	}
	
	else if($_SERVER['REQUEST_METHOD'] == "POST"){
		$errorDob = "* Please insert your real date of birth.";
	}
?>