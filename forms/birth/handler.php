<?php
	var_dump($_REQUEST);
	echo "<br><br>";
	
	function check($x){
		for($i = 0; $i < strlen($x); $i++){
			if(!($x[$i] >= '0' and $x[$i] <= '9')){
				return false;
			}
		}
		
		return true;
	}
	
	if(isset($_REQUEST['day']) && isset($_REQUEST['month']) && isset($_REQUEST['year']) && !empty($_REQUEST['day']) && !empty($_REQUEST['day']) && !empty($_REQUEST['month']) && !empty($_REQUEST['year'])){
		$day = $_REQUEST['day'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];
		
		if(!check($day) or !check($month) or !check($year)){
			echo "Fill the fields properly.";
			require "birth.html";
		}
		
		else{
			$fd = true;
			$fm = true;
			$fy = true;
			$leap = ((!($year % 4) && ($year % 100)) || !($year % 400)) ? 1 : 0;
			
			if(!($day >= 1 and $day <= 31)){
				$fd = false;
			}
			if(!($month >= 1 and $month <= 12)){
				$fd = false;
			}
			if($month == 2){
				if(!$leap and $day >= 29){
					$fd = false;
				}
				else{
					if($day > 29){
						$fd = false;
					}
				}
			}
			
			if(!$fd or !$fm){
				echo "Fill the fields properly.";
				require "birth.html";
			}
			
			else{
				echo "$day/$month/$year<br>";
				if($leap){
					echo "Its a leap year!";
				}
			}
		}
	}
	
	else{
		echo "Fill all the fields.";
		require "birth.html";
	}
?>