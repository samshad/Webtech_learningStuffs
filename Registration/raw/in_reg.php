<?php
    $script = $_SERVER['SCRIPT_NAME'];
    
    require "name/name.php";
    require "email/email.php";
    require "username/userName.php";
    require "password/password.php";
?>

<form action="<?php echo $script; ?>" method = "POST">
    <fieldset>
        <legend>Registration</legend>
        First Name:
        <input name = "firstName" maxlength="25"/><br>
        Last Name:
        <input name = "lastName" maxlength="25"/><br>
        <?php echo $errorName; ?>
        <hr>
        Email:
        <input name = "email" maxlength="50"/> <label title = "hint: xxx@yz.com">H</label>
        <?php echo $errorEmail; ?>
        <hr>
        User Name:
        <input name = "userName" maxlength="25"/>
	    <?php echo $errorUserName; ?>
        <hr>
        Password:
        <input type="password" name = "pass1"/> <label title = "Password lenght must be more or equal 6 characters long and must contain at least one of the special characters (@, #, $, %).">H</label>
	    <?php echo $errorPass1; ?>
        <hr>
        Confirm Password:
        <input type="password" name = "pass2"/>
	    <?php echo $errorPass2; ?>
        <hr>
        <input type = "submit"/>
    </fieldset>
</form>

<?php
    echo $pass;
?>