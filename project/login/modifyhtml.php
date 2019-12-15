<?php
	$idVal = $_POST['btnmod'];
	
	//logout on it
?>

<!DOCTYPE html>

<form method = "post" action = "modify.php">
	<input type = "date" name = "datedue"> Enter New Due Date<br><br>
	<input type = "time" name = "timedue"> Enter New Time Due<br><br>
	<input type = text name = "title"> Enter New Title<br><br>

	<input type = text name = "description" max = 144> Enter New Description<br><br>
	<input type="checkbox" name="complete" value="complete"> Task Complete?<br><br>
	<button type = "submit" name = "inter" value = "<?php echo $idVal;?>" formmethod = "post">Save</button>
	
</form>