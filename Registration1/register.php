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
			<a href="login.php">Login </a> |
			<a href="register.php">Register</a>
		</td>
	</tr>
	<tr>
		<td colspan="3">
            <?php
            require "in_back/in_reg.php";
            ?>
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