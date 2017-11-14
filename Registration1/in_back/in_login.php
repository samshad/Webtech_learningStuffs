<?php
    require "core.php";

    $name = $pass = $error = "";

    if(isset($_REQUEST['name'])){
        $tmpName = $_REQUEST['name'];
        if(empty($tmpName)){
            $error = "* Invalid User Name or Password.<br>";
        }

        $name = $tmpName;
    }

    if(isset($_REQUEST['pass'])){
        $tmpPass = $_REQUEST['pass'];

        if(empty($tmpPass)){
	        $error = "* Invalid User Name or Password.<br>";
        }

        $pass = $tmpPass;
    }
?>

<form action = "<?php echo $scriptName; ?>" method = "POST">
    <fieldset>
        <legend>Login</legend>
        <?php echo $error; ?>
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