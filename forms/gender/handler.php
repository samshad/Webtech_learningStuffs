<?php
	var_dump($_REQUEST);
	echo "<br><br>";
	
	if(isset($_REQUEST['gender'])){
		
		if($_REQUEST['gender'] == 1)
			echo "Male";
		else if($_REQUEST['gender'] == 2)
			echo "Female";
		else
			echo "Others";
	}
	
	else{
		echo "Select one.";
		require "gender.html";
	}
?>