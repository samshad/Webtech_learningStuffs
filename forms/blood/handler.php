<?php
	var_dump($_REQUEST);
	echo "<br><br>";
	
	if(isset($_REQUEST['blood'])){
		echo $_REQUEST['blood'];
	}
	
	else{
		echo "Must be selected.";
		require "blood.html";
	}
?>