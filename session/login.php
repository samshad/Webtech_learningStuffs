<?php
	require "core.php";
?>

<form action = "<?php echo $scriptName; ?>" method = "POST">
	<fieldset>
		<legend>Login</legend>
		User Name:
		<input name = "name" /><br>
		Password :
		<input name = "pass" type = "password"/><br>
		<hr>
		<input name = "rememberMe" type = "checkbox"/>Remember Me<br>
	</fieldset>
	<input type = "Submit"/>
	<a href = "forgotPass.php">Forgot Password?</a>
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //$userList = $_SESSION['userList'];
        foreach($_SESSION['userList'] as $user){
            if($user['userName'] == $_REQUEST['name']){
                if($user['password'] == $_REQUEST['pass']){
                    $loggedIn = true;
                    $userName = $user['name'];
                    header("Location: home.php");
                }
            }
        }
        echo "Pailo na to...";
    }
?>
