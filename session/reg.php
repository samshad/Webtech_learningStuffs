<?php
require "core.php";


?>

<form action="<?php echo $scriptName; ?>" method = "POST">
	<fieldset>
		<legend>Registration</legend>
		Name:
		<input name = "name" maxlength="25"/><br>
		<hr>
		User Name:
		<input name = "userName" maxlength="25"/>
		<hr>
		Password:
		<input type = "password" name = "pass"/> <label title = "Password length must be more or equal 6 characters long and must contain at least one of the special characters (@, #, $, %).">H</label>
		<hr>
	</fieldset>
	<hr>
	<input type = "submit"/>
	</fieldset>
</form>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//var_dump($Name);
		$_SESSION['userList'][$userId] = array("userName" => $_REQUEST['userName'], "password" => $_REQUEST['pass'], "name" => $_REQUEST['name']);
		header("location: home.php");
	}
?>
