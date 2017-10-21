<?php
	$gender = $errorGender = "";
	
	if(isset($_REQUEST['gender'])){
		if($_REQUEST['gender'] == 1)
			$gender = "Male";
		else if($_REQUEST['gender'] == 2)
			$gender = "Female";
		else
			$gender = "Others";
	}
	
	else if($_SERVER['REQUEST_METHOD'] == "POST"){
		$errorGender = "* Please select one.";
	}
?>