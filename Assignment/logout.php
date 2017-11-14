<?php
	include_once "includes/session.inc.php";
	session_unset();
	//session_destroy();
	header("Location: index.php");