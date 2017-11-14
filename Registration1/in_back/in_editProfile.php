<?php
    require "core.php";

    require "name/name.php";
    require "email/email.php";
    require "gender/gender.php";
    require "dob/dob.php";
?>

<form action="<?php echo $scriptName; ?>" method = "POST">
    <fieldset>
        <legend>Edit Profile</legend>
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
