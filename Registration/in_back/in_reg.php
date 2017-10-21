<?php
    require "core.php";
    
    require "name/name.php";
    require "email/email.php";
    require "username/userName.php";
    require "password/password.php";
    require "gender/gender.php";
    require "dob/dob.php";
?>

<form action="<?php echo $scriptName; ?>" method = "POST">
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
        <input type = "password" name = "pass1"/> <label title = "Password length must be more or equal 6 characters long and must contain at least one of the special characters (@, #, $, %).">H</label>
	    <?php echo $errorPass1; ?>
        <hr>
        Confirm Password:
        <input type = "password" name = "pass2"/>
	    <?php echo $errorPass2; ?>
        <hr>
        <fieldset>
            <legend>Gender</legend>
            <input name = "gender" value = "1" type = "radio"/>Male
            <input name = "gender" value = "2" type = "radio"/>Female
            <input name = "gender" value = "3" type = "radio"/>Other
	        <?php echo $errorGender; ?>
        </fieldset>
        <hr>
        <fieldset>
            <legend>Date of Birth</legend>
            <table>
                <tr>
                    <th align = "center"><input name = "day" maxlength = "2"/></th>
                    <th align = "center">/</th>
                    <th align = "center"><input name = "month" maxlength = "2"/></th>
                    <th align = "center">/</th>
                    <th align = "center"><input name = "year" maxlength = "4"/>  (dd/mm/yyyy)</th>
                </tr>
            </table>
	        <?php echo $errorDob; ?>
        </fieldset>
        <hr>
        <input type = "submit"/>
    </fieldset>
</form>

<?php

?>