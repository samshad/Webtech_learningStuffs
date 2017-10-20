<?php
    $script = $_SERVER['SCRIPT_NAME'];
    
    require "name/name.php";
    require "email/email.php";
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
        <input name = "userName" maxlength="25"/><br>
        <hr>
        <input type = "submit"/>
    </fieldset>
</form>

<?php
    echo $firstName;
?>