<html>
	<head>
		<title>SRU FORM</title>
		<style>
			table{
				border-spacing: 0;
				padding: 0;
			}
		</style>
	</head>
	<body>
		<table align = "center" width = 90% border = "1">
			<tr>
				<td align = "center">
					<h1>Testing form 1</h1>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						$name = $ername = $email = $eremail = "";
						$erdate = $d = $m = $y = "";
						$gender = $ergender = $ercheckbox = $checkbox = "";
						$blood = $erblood = "";
						
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
			                        $name = $tname;
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
		                            $email = $mail;
	                            }
                            }
                        }
					
                        function check($x){
                            for($i = 0; $i < strlen($x); $i++){
                                if(!($x[$i] >= '0' and $x[$i] <= '9')){
                                    return false;
                                }
                            }
                            
                            return true;
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
                                    $d = $day . "/"; $m = $month . "/"; $y = $year;
                                }
                            }
                        }
                        
                        function gender(){
	                        if(isset($_REQUEST['gender'])){
		                        if($_REQUEST['gender'] == 1)
			                        $GLOBALS['gender'] = "Male";
		                        else if($_REQUEST['gender'] == 2)
			                        $GLOBALS['gender'] = "Female";
		                        else
			                        $GLOBALS['gender'] = "Others";
	                        }
	
	                        else{
		                        $GLOBALS['ergender'] = " * Select one.";
	                        }
                        }
                        
                        function checkBox(){
	                        $cnt = 0;
	
	                        if(isset($_REQUEST['SSC'])) $cnt++;
	                        if(isset($_REQUEST['HSC'])) $cnt++;
	                        if(isset($_REQUEST['BSc'])) $cnt++;
	                        if(isset($_REQUEST['MSc'])) $cnt++;
	
	                        if($cnt < 2){
		                        $GLOBALS['ercheckbox'] = " * At least two of them must be selected.";
	                        }
	
	                        else{
		                        if(isset($_REQUEST['SSC'])) $GLOBALS['checkbox'] .= "SSC ";
		                        if(isset($_REQUEST['HSC'])) $GLOBALS['checkbox'] .= "HSC ";
		                        if(isset($_REQUEST['BSc'])) $GLOBALS['checkbox'] .= "BSc ";
		                        if(isset($_REQUEST['MSc'])) $GLOBALS['checkbox'] .= "MSc ";
	                        }
                        }
                        
                        function bloodGroup(){
	                        if(isset($_REQUEST['blood'])){
		                        $GLOBALS['blood'] = $_REQUEST['blood'];
	                        }
	
	                        else{
		                        $GLOBALS['erblood'] = " * Must be selected.";
	                        }
                        }
                        
                        gender();
                        checkBox();
                        bloodGroup();
                        
					?>

                    <form action = "index.php">
                        Name:
                        <input name = "name" type = "text"/> <?php echo "$ername <br><br>" ?>
                        E-mail:
                        <input name = "email" /> <label title = "hint: xxx@yz.com">H</label>
	                    <?php echo "$eremail <br><br>" ?>
                        
                        <table>
                            Date of Birth:
                            <tr>
                                <th align = "center">dd</th>
                                <td></td>
                                <th align = "center">mm</th>
                                <td></td>
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
	                    <?php echo "$erdate <br><br>" ?>

                        Gender:
                        <input name = "gender" value = "1" type = "radio"/>Male
                        <input name = "gender" value = "2" type = "radio"/>Female
                        <input name = "gender" value = "3" type = "radio"/>Other
	                    <?php echo "$ergender <br><br>" ?>

                        Degree:
                        <input name = "SSC" type = "checkbox"/>SSC
                        <input name = "HSC" type = "checkbox"/>HSC
                        <input name = "BSc" type = "checkbox"/>BSc
                        <input name = "MSc" type = "checkbox"/>MSc
	                    <?php echo "$ercheckbox <br><br>" ?>

                        Blood Group:
                        <select name = "blood">
                            <option disabled selected value> -- select an option -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B">B</option>
                        </select>
	                    <?php echo "$erblood <br><br>" ?>
                        
                        <br><input type = "Submit"/>
                        
                    </form>
                    
				</td>
			</tr>
            <tr>
                <td>
	                <?php
	                    echo "Name: $name <br>";
	                    echo "Email: $email <br>";
	                    echo "Date: $d$m$y<br>";
	                    echo "Gender: $gender<br>";
	                    echo "Degree: $checkbox<br>";
	                    echo "Blood Group: $blood<br>";
	                ?>
                </td>
            </tr>
		</table>
	</body>
</html>