<?php
    $script = $_SERVER['SCRIPT_NAME'];
    $newPass = "";
    $curOk = false;
    $error = "";

    if(isset($_REQUEST['curPass'])){
        $pass = $_REQUEST['curPass'];
        if($_SERVER["REQUEST_METHOD"] == "POST" and empty($pass)){
            $error = "Fill all the fields";
        }

        $curPass = $pass;
        $curOk = true;
    }

    if(isset($_REQUEST['newPass']) and isset($_REQUEST['RNewPass']) and $curOk){
        $pass1 = $_REQUEST['newPass'];
        $pass2 = $_REQUEST['RNewPass'];

        if($_SERVER["REQUEST_METHOD"] == "POST" and (empty($pass1) || empty($pass2))){
            $error = "Fill all the fields";
        }

        else{
            function check($pass){
                for($i = 0; $i < strlen($pass); $i++){
                    if($i == '@' or $i == '#' or $i == '$' or $i == '%'){
                        return true;
                    }
                }
                return false;
            }

            if(strlen($pass1) < 8) echo "Password lenght must be more or equal 8 characters long.";
            else if(!check($pass1)) echo "Must contain at least one of the special characters (@, #, $, %).";
            else if($pass1 != $pass2) echo "Entered new passwords didn't matched.";
            else $newPass = $pass1; //1234567@}
        }
    }
?>

<form action = "<?php echo $script; ?>" method = "POST">
    <fieldset>
        <legend>Change Password</legend>
        Current Password:
        <input name = "curPass"  type = "password"/><br>
        New Password:
        <input name = "newPass" type = "password"/><br>
        Retype New Password:
        <input name = "RNewPass" type = "password"/><br>
        <hr>
    </fieldset>
    <input type = "Submit"/>
</form>

<?php
    if(!empty($newPass)){
        echo "New Password: $newPass";
    }

    else {
        echo $error;
    }
?>