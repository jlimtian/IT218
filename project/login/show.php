<html>
	<body>
      		<input style="float:right;"
		type="submit" class="submit" name="logout" value="Logout"
                	onclick="window.location.href = 'logout.php';"><br><br>
	</body>
</html>



<?php
	require 'db.php' ;
	$sql = "SELECT id, owneremail, title, createddate, duedate, message FROM todos WHERE owneremail = :email AND isdone = 0";
	$email = "janedoe@njit.edu";
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$returns = $run_q->runQuery($sql, $conn, $email);
	
	//fnam eand lname on every page
<<<<<<< HEAD
	/* $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password']; */
=======
	/*$fname = $_POST['whatever fname field is called'];
	$lname = $_POST['whatever lname field is called'];
	$email = $_POST['email'];*/
>>>>>>> b11161c5c54fe6c85546b97bba0713aa2b8b7986
	
	//temp values
	$fname = "August";
	$lname = "Lee";
	$email = "janedoe@njit.edu";
	
<<<<<<< HEAD
	
	echo "Welcome, " . $fname . " " . $lname . ".<br><br>";
	//every page
=======
	echo "Welcome, " . $fname . " " . $lname . ".<br><br>";
>>>>>>> b11161c5c54fe6c85546b97bba0713aa2b8b7986
	
	
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
