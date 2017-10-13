<?php
if(isset($_REQUEST['name'])){
	$name = $_REQUEST['name'];
	if(empty($name)){
		echo "Fill all the fields.";
		//require "name.html";
	}
	
	else{
		$f = true;
		
		if(!(($name[0] >= 'a' and $name[0] <= 'z') || ($name[0] >= 'A' and $name[0] <= 'Z'))){
			$f = false;
		}
		
		for($i = 0; $i < strlen($name); $i++){
			if(!(($name[$i] >= 'a' and $name[$i] <= 'z') || ($name[$i] >= 'A' and $name[$i] <= 'Z') || $name[$i] == '.' || $name[$i] == '-' || $name[$i] == ' ')){
				$f = false;
				break;
			}
		}
		
		if(!$f or str_word_count($name) < 2){
			echo "Insert the name in correct format.";
			//require "name.html";
		}
		
		else{
			echo "Name: " . $name;
		}
	}
}
?>

<form action = "tmp.php">
	<label>Name</label>
	<br>
	<input name = "name" type = "text"/>
	<input type = "Submit"/>
</form>
