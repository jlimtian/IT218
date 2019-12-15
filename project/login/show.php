<html>
	<body>
      		<input style="float:right;"
		type="submit" class="submit" name="logout" value="Logout"
                	onclick="window.location.href = 'logout.php';"><br><br>
	</body>
</html>



<?php
	require 'db.php';
	session_start();
	
	
	$sql = "SELECT * FROM accounts WHERE id = :idVal";
	$idVal = $_SESSION["id"];
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$returns = $run_q->runDeleteQuery($sql, $conn, $idVal);
	
	foreach($returns as $return) {
		$email = $return['email'];
		$fname = $return['fname'];
		$lname = $return['lname'];
	}
	
	$sql = "SELECT id, owneremail, title, createddate, duedate, message FROM todos WHERE owneremail = :email AND isdone = 0";
	$returns = $run_q->runQuery($sql, $conn, $email);
	
	//temp values
	//$fname = "August";
	//$lname = "Lee";
	//$email = "janedoe@njit.edu";
	
	echo "Welcome, " . $fname . " " . $lname . ".<br><br>";
	
	
	$num_recs = 0;
	echo "Incomplete Tasks: <br><br>";
	echo "<table border=\"0\"><tr><th>ID</th><th>Owner Email</th><th>Title</th><th>Date Created</th><th>Date Due</th><th>Message</th></tr>";
	foreach($returns as $return) {
?>

<tr>
	<td align="center"><?php echo $return['id']; ?></td>
	<td align="center"><?php echo $return['owneremail']; ?></td>
	<td align="center"><?php echo $return['title']; ?></td>
	<td align="center"><?php echo $return['createddate']; ?></td>
	<td align="center"><?php echo $return['duedate']; ?></td>
	<td align="center"><?php echo $return['message']; ?></td>
	<td><form action = "modifyhtml.php" method = "Post"><button id = "btnm" name = "btnmod" type = "submit" value = "<?php echo $return['id'];?>" formmethod = "post"><b> MODIFY</b></button></form></td>
	<td><form action = "delete.php" method = "Post"><button id = "btnd" name = "btndel" type = "submit" value = "<?php echo $return['id'];?>" formmethod = "post"><b> DELETE</b></button></form></td>
	<td><form action = "delete.php" method = "Post"><button id = "btnc" name = "btncomp" type = "submit" value = "<?php echo $return['id'];?>" formmethod = "post"><b> COMPLETE</b></button></form></td>
</tr>

<?php 
	$num_recs++;
	echo "<br>"; }
	
	echo "<br><br>" . $num_recs . " task(s) found. <br><br>";
	
?>

<!DOCTYPE html>
<form action = "createhtml.php" method = "Post"><button id = "btnn" name = "btnnew" type = "submit" value = "<?php echo $email;?>" formmethod = "post""><b> NEW</b></button></form>

<?php
	
	$sql = "SELECT id, owneremail, title, createddate, duedate, message FROM todos WHERE owneremail = :email AND isdone = 1";
	$returns = $run_q->runQuery($sql, $conn, $email);
	echo "Complete Tasks: <br><br>";
	
	$num_comp_recs = 0;
	
	echo "<table border=\"0\"><tr><th>ID</th><th>Owner Email</th><th>Title</th><th>Date Created</th><th>Date Due</th><th>Message</th></tr>";
	foreach($returns as $return) {

?>

<tr>
	<td align="center"><?php echo $return['id']; ?></td>
	<td align="center"><?php echo $return['owneremail']; ?></td>
	<td align="center"><?php echo $return['title']; ?></td>
	<td align="center"><?php echo $return['createddate']; ?></td>
	<td align="center"><?php echo $return['duedate']; ?></td>
	<td align="center"><?php echo $return['message']; ?></td>
	<td><form action = "modifyhtml.php" method = "Post"><button id = "btnmc" name = "btnmod" type = "submit" value = "<?php echo $return['id'];?>" formmethod = "post"><b> MODIFY</b></button></form></td>
	<td><form action = "delete.php" method = "Post"><button id = "btndc" name = "btndel" type = "submit" value = "<?php echo $return['id'];?>" formmethod = "post"><b> DELETE</b></button></form></td>
	<td><form action = "delete.php" method = "Post"><button id = "btncc" name = "btncomp" type = "submit" value = "<?php echo $return['id'];?>" formmethod = "post"><b> COMPLETE</b></button></form></td>
</tr>

<?php 
	$num_comp_recs++;
	echo "<br>"; } 
	
	echo "<br><br>" . $num_comp_recs . " task(s) found. <br>";
	
	
?>
