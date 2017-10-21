<html>
<head>
	<title>Vogue</title>
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
		<td>
			<a href="home.php"><img src = "in_back/burger.JPG" alt = "Burger Logo"></a>
		</td>
		<td align = "right" colspan="2">
			Logged in as <a href = "loggedinHome.php"> ?Name? </a> |
			<a href="logout.php">Logout</a>
		</td>
	</tr>
	<tr>
		<td>
			<h4>Account</h4>
			<hr>
			<ui>
				<li><a href="loggedinHome.php">Dashboard</a></li>
				<li><a href="viewProfile.php">View Profile</a></li>
				<li><a href="editProfile">Edit Profile</a></li>
				<li><a href="">Change Profile Picture</a></li>
				<li><a href="changePass.php">Change Password</a></li>
				<li><a href="">Logout</a></li>
			</ui>
		</td>
		<td colspan="2">
			<?php include "in_back/in_changePass.php"; ?>
		</td>
	</tr>
	<tr>
		<td colspan = "3">
			<p align = "center">Copyright &copy; 2017</p>
		</td>
	</tr>
</table>
</body>
</html>