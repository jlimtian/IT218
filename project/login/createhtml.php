<?php
	$email = $_POST['btnnew'];
?>

<!DOCTYPE html>

<form method = "post" action = "create.php">
	<input type = "date" name = "datedue"> Enter Due Date<br><br>
	<input type = "time" name = "timedue"> Enter Time<br><br>
	<input type = text name = "title"> Enter Title<br><br>
	<input type = text name = "description" max = 144> Enter Description<br><br>
	
	<button type = "submit" name = "mid" value = "<?php echo $email;?>" formmethod = "post">Save</button>
	
</form>