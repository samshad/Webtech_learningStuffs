<?php
    require "core.php";
    $newPass = $errorPass = "";

    function checkNewPass($pass){
        for($i = 0; $i < strlen($pass); $i++){
            if($i == '@' or $i == '#' or $i == '$' or $i == '%'){
                return true;
            }
        }
        return false;
    }

    if(isset($_REQUEST['curPass']) and isset($_REQUEST['newPass1']) and isset($_REQUEST['newPass2']) and !empty($_REQUEST['curPass']) and !empty($_REQUEST['newPass1']) and !empty($_REQUEST['newPass2'])){
        $pass = $_REQUEST['curPass'];
	    $pass1 = $_REQUEST['newPass1'];
	    $pass2 = $_REQUEST['newPass2'];
	
	    if(strlen($pass1) < 6) $errorPass = "* Invalid Password.";
	    else if(!checkNewPass($pass1)) $errorPass = "* Invalid Password.";
	    else if($pass1 != $pass2) $errorPass = "* Passwords didn't matched.";
	    else $newPass = $pass1; //1234567@}
    }

    else if($_SERVER["REQUEST_METHOD"] == "POST"){
        $errorPass = "* Fill all the fields.";
    }
?>

<form action = "<?php echo $scriptName; ?>" method = "POST">
    <fieldset>
        <legend>Change Password</legend>
        Current Password:
        <input name = "curPass"  type = "password"/><br>
        New Password:
        <input name = "newPass1" type = "password"/> <label title = "Password length must be more or equal 6 characters long and must contain at least one of the special characters (@, #, $, %).">H</label>
	    <?php echo $errorPass; ?>
        <br>
        Retype New Password:
        <input name = "newPass2" type = "password"/>
	    <?php echo $errorPass; ?>
        <hr>
    </fieldset>
    <input type = "Submit"/>
</form>

<?php
    if(!empty($newPass)){
        echo "New Password: $newPass";
    }

    else {
        echo $errorPass;
    }
?>