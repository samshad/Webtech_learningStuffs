<?php
	var_dump($_REQUEST);
	echo "<br><br>";
	
	$cnt = 0;

	if(isset($_REQUEST['SSC'])) $cnt++;
	if(isset($_REQUEST['HSC'])) $cnt++;
	if(isset($_REQUEST['BSc'])) $cnt++;
	if(isset($_REQUEST['MSc'])) $cnt++;
	
	if($cnt < 2){
		echo "At least two of them must be selected.";
		require "degree.html";
	}
	
	else{
		if(isset($_REQUEST['SSC'])) echo "SSC <br>";
		if(isset($_REQUEST['HSC'])) echo "HSC <br>";
		if(isset($_REQUEST['BSc'])) echo "BSc <br>";
		if(isset($_REQUEST['MSc'])) echo "MSc <br>";
	}
?>