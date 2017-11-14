<?php
    include_once "session.inc.php";
?>

<html>
<head>
    <title>Assignment</title>
</head>
</html>

<?php
    if(!isset($_SESSION['currUser'])){
        echo '<td align = "left">
                <a href="index.php"><img src="raw/burger.png" alt="Burger" height="50" width="50"></a>
                </td>

                <td align = "right">
                    <a href="index.php">HOME</a>|
                    <a href="login.php">LOGIN</a>|
                    <a href="signup.php">REGISTRATION</a>
                </td>';
    }
    
    else{
	    $userName = $_SESSION['currUser']['userName'];
	
	    echo '<td align = "left">
                <a href="index.php"><img src="raw/burger.png" alt="Burger" height="50" width="50"></a>
                </td>

                <td align = "right">
                    <label>Logged in as </label>
                    <a href="profile.php">' . $userName . '</a>|
                    <a href="logout.php">Logout</a>|
                </td>';
    }
?>