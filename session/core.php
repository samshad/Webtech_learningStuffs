<?php
	ob_start();
	session_start();
	$scriptName = $_SERVER['SCRIPT_NAME'];

	if(!isset($_SESSION['userList'])){
		$_SESSION['userList'] = array();
	}
	
	$userId = count($_SESSION['userList']);
	
	
	/*if($_SERVER["REQUEST_METHOD"] == "POST" and !empty($_REQUEST['name'])){
		$name = $_REQUEST['name'];
		$_SESSION['userList'][$userId] = array($name);
	}*/
	//var_dump($userId);
	
	var_dump($_SESSION);
?>
