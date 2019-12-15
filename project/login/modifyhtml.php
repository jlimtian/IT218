<html>
      	<input style="float:right;"
                type="submit" class="submit" name="logout" value="Logout"
                        onclick="window.location.href = 'logout.php';"><br><br>
</html>

<?php
	$idVal = $_POST['btnmod'];
	
	require 'db.php';
	$sql = "SELECT * FROM todos WHERE id = :idVal";
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$returns = $run_q->runDeleteQuery($sql, $conn, $idVal);
	
	
	echo "<br><br><br><table border=\"0\"><tr><th>ID</th><th>Title</th><th>Date Created</th><th>Date Due</th><th>Message</th></tr>";
	foreach($returns as $return) {
?>

<tr>
	<td align="center"><?php echo $return['id']; ?></td>
	<td align="center"><?php echo $return['title']; ?></td>
	<td align="center"><?php echo $return['createddate']; ?></td>
	<td align="center"><?php echo $return['duedate']; ?></td>
	<td align="center"><?php echo $return['message']; ?></td>
</tr>

<?php 
	echo "<br>"; }
	
	//logout on it
?>

<!DOCTYPE html>

<form method = "post" action = "modify.php">
	<input type = "date" name = "datedue"> Enter New Due Date<br><br>
	<input type = "time" name = "timedue"> Enter New Time Due<br><br>
	<input type = text name = "title"> Enter New Title<br><br>
	
	<input type = text name = "description" max = 144> Enter New Description<br><br>
	
	<input type="checkbox" name="complete" value="on"> Task Complete?<br><br>
	
	<button type = "submit" name = "inter" value = "<?php echo $idVal;?>" formmethod = "post">Save</button>
	
</form>
