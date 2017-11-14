<?php
	require "core.php";
	$name = $email = $gender = $day = $month = $year = "";
?>

<form action="<?php echo $scriptName; ?>">
	<fieldset>
		<legend>Profile</legend>
		Name: <?php echo $name; ?>
		<hr>
		Email: <?php echo $email; ?>
		<hr>
		Gender: <?php echo $gender; ?>
		<hr>
		Date of birth: <?php echo $day . "/" . $month . "/" . $year; ?>
		<hr>
		<a href="editProfile.php">Edit Profile</a>
	</fieldset>
</form>
