<?php
    $script = $_SERVER['SCRIPT_NAME'];
    $fname = $ername = $femail = $eremail = $funame = $eruname = "";
    $erdate = $fday = $fmonth = $fyear = "";
    $fgender = $ergender = "";
    $fpass = $erpass = "";

    if(isset($_REQUEST['name'])){
        $tname = $_REQUEST['name'];
        if(empty($tname)){
            $ername = " * Name required.";
        }

        else{
            $f = true;

            if(!(($tname[0] >= 'a' and $tname[0] <= 'z') || ($tname[0] >= 'A' and $tname[0] <= 'Z'))){
                $f = false;
            }

            for($i = 0; $i < strlen($tname); $i++){
                if(!(($tname[$i] >= 'a' and $tname[$i] <= 'z') || ($tname[$i] >= 'A' and $tname[$i] <= 'Z') || $tname[$i] == '.' || $tname[$i] == '-' || $tname[$i] == ' ')){
                    $f = false;
                    break;
                }
            }

            if(!$f or str_word_count($tname) < 2){
                $ername = " * Enter the name properly.";
            }

            else{
                $fname = $tname;
            }
        }
    }

    function checkString($x, $y){
        $f = true;

        for($i = 0; $i < strlen($x); $i++){
            if($y == 1){
                if(!(($x[$i] >= 'a' and $x[$i] <= 'z') || ($x[$i] >= 'A' and $x[$i] <= 'Z') || ($x[$i] >= '0' and $x[$i] <= '9') || $x[$i] == '.' || $x[$i] == '_' || $x[$i] == '-')){
                    $f = false;
                    break;
                }
            }

            else{
                if(!(($x[$i] >= 'a' and $x[$i] <= 'z') || ($x[$i] >= 'A' and $x[$i] <= 'Z'))){
                    $f = false;
                    break;
                }
            }
        }

        return $f;
    }

    if(isset($_REQUEST['email'])){
        $mail = $_REQUEST['email'];

        if(empty($mail)){
            $eremail =  " * Email required.";
        }

        else{
            $at = 0;
            $cnt = 0;
            $f = true;

            for($i = 0; $i < strlen($mail); $i++){
                if($mail[$i] == '@'){
                    $cnt++;
                    $at = $i;
                }
            }

            if($cnt > 1){
                $f = false;
            }

            $a = null;
            $b = null;
            $c = null;

            $i = 0;

            while($i < strlen($mail) and $i < $at)
                $a .= $mail[$i++];

            $i++;

            while($i < strlen($mail) and $mail[$i] != '.')
                $b .= $mail[$i++];

            $i++;

            while($i < strlen($mail))
                $c .= $mail[$i++];

            if(empty($a) or empty($b) or empty($c)){
                $f = false;
            }

            if(!checkString($a, 1) or !checkString($b, 2) or !checkString($c, 3)){
                $f = false;
            }

            if(!$f){
                $eremail = " * Insert the email address properly.";
            }

            else{
                $femail = $mail;
            }
        }
    }

    if(isset($_REQUEST['userName'])){
        $name = $_REQUEST['userName'];
        if(empty($name)){
            $eruname = " * User name required.<br>";
        }

        else{
            $f = true;

            if(!(($name[0] >= 'a' and $name[0] <= 'z') || ($name[0] >= 'A' and $name[0] <= 'Z'))){
                $f = false;
            }

            for($i = 0; $i < strlen($name); $i++){
                if(!(($name[$i] >= 'a' and $name[$i] <= 'z') || (($name[$i] >= '0' and $name[$i] <= '9') || ($name[$i] >= 'A' and $name[$i] <= 'Z') || $name[$i] == '.' || $name[$i] == '-' || $name[$i] == '_'))){
                    $f = false;
                    break;
                }
            }

            if(!$f or str_word_count($name) > 1 or strlen($name) < 2){
                $eruname = " * Insert the name in correct format.";
            }

            else{
                $funame = $name;
            }
        }
    }

    if(isset($_REQUEST['pass1']) and isset($_REQUEST['pass2'])){
        $pass1 = $_REQUEST['pass1'];
        $pass2 = $_REQUEST['pass2'];

        if($_SERVER["REQUEST_METHOD"] == "POST" and (empty($pass1) || empty($pass2))){
            $erpass .= "Insert Passwords.<br>";
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

            if(strlen($pass1) < 8) $erpass .= "Password lenght must be more or equal 8 characters long.<br>";
            else if(!check($pass1)) $erpass .= "Must contain at least one of the special characters (@, #, $, %).<br>";
            else if($pass1 != $pass2) $erpass .= "Entered new passwords didn't matched.<br>";
            else $fpass = $pass1;
        }
    }

    if(isset($_REQUEST['day']) && isset($_REQUEST['month']) && isset($_REQUEST['year'])){
        $day = $_REQUEST['day'];
        $month = $_REQUEST['month'];
        $year = $_REQUEST['year'];

        if(empty($day) or empty($month) or empty($year)){
            $erdate = " * Please insert your Birth date.";
        }

        else if(!check($day) or !check($month) or !check($year)){
            $erdate = "Fill the fields properly.";
        }

        else{
            $fd = true;
            $fm = true;
            $fy = true;
            $leap = ((!($year % 4) && ($year % 100)) || !($year % 400)) ? 1 : 0;

            if(!($day >= 1 and $day <= 31)){
                $fd = false;
            }
            if(!($month >= 1 and $month <= 12)){
                $fd = false;
            }
            if($month == 2){
                if(!$leap and $day >= 29){
                    $fd = false;
                }
                else{
                    if($day > 29){
                        $fd = false;
                    }
                }
            }

            if(!$fd or !$fm){
                $erdate = " * Fill the fields properly.";
            }

            else{
                $fday = $day . "/"; $fmonth = $month . "/"; $fyear = $year;
            }
        }
    }

    if(isset($_REQUEST['gender'])){
        if($_REQUEST['gender'] == 1)
            $fgender = "Male";
        else if($_REQUEST['gender'] == 2)
            $fgender = "Female";
        else
            $fgender = "Others";
    }

    else if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ergender = " * Select one.";
    }

?>

<form action = "<?php echo $script; ?>" method = "POST">
    <fieldset>
        <legend>REGISTRATION</legend>
        Name:
        <input name = "name" /><hr>
        E-mail:
        <input name = "email" /> <label title = "hint: xxx@yz.com">H</label><hr>
        User Name:
        <input name = "userName" /><hr>
        Password:
        <input name = "pass1" type = "password"/><hr>
        Confirm Password:
        <input name = "pass2" type = "password"/><hr>
        <fieldset>
            <legend>Gender</legend>
            <input name = "gender" value = "1" type = "radio"/>Male<br>
            <input name = "gender" value = "2" type = "radio"/>Female<br>
            <input name = "gender" value = "3" type = "radio"/>Other
        </fieldset>
        <fieldset>
            <legend>Date of Birth</legend>
            <table>
              <tr>
                <th align = "center">dd</th>
                <th></th>
                <th align = "center">mm</th>
                <th></th>
                <th align = "center">yyyy</th>
              </tr>
              <br>
              <tr>
                <th align = "center"><input name = "day"/></th>
                <th align = "center">/</th>
                <th align = "center"><input name = "month"/></th>
                <th align = "center">/</th>
                <th align = "center"><input name = "year"/></th>
              </tr>
            </table>
            <hr>
        </fieldset>
    </fieldset>
    <input type = "Submit"/>
    <input type = "Submit" value = "Reset"/>
</form>

<?php
   if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($fname) && !empty($femail) && !empty($funame) && !empty($fpass) && !empty($fgender) && !empty($fday) && !empty($fmonth) && !empty($fyear)){
       echo "Name: $fname<br>";
       echo "Email: $femail<br>";
       echo "User Name: $funame<br>";
       echo "password: $fpass<br>";
       echo "Date: $fday$fmonth$fyear<br>";
       echo "Gender: $fgender<br>";
   }

   else if($_SERVER["REQUEST_METHOD"] == "POST" ){
       echo "Name: $ername<br>";
       echo "Email: $eremail<br>";
       echo "User Name: $eruname<br>";
       echo "password: $erpass<br>";
       echo "Date: $erdate<br>";
       echo "Gender: $ergender<br>";
   }
?>