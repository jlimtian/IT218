<?php
	//$sql = "SELECT * FROM accounts WHERE ";
	
	$dsn = 'mysql:host=sql1.njit.edu;dbname=jag94';
	$username = 'jag94';
	$password = 'hallow98';
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "jag94"; //your database name

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully<br>"; //remove later 
		echo "</br>";
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo "<br>Error Message: $error_message <br>";
	}
	
	//fnam eand lname on every page
	/*$fname = $_POST['whatever fname field is called'];
	$lname = $_POST['whatever lname field is called'];
	$email = $_POST['email'];
	$pword = $_POST['password'];*/
	
	//temp values
	$fname = "August";
	$lname = "Lee";
	$email = "janedoe@njit.edu";
	
	echo "Welcome, " . $fname . " " . $lname . ".<br><br>";
	//every page
	
	//incomplete tasks
	echo "Incomplete Tasks: <br><br>";
	$sql = "SELECT * FROM todos WHERE owneremail = :email AND isdone = 0";
	$statement = $conn->prepare($sql);
	$statement->bindValue(':email', $email);
	$statement->execute();
	
	$returns = $statement->fetchAll();
	$statement->closeCursor();
	$num_recs = 0;
	foreach($returns as $return) {

//3. html table*/ fetchall and closecursor
?>

<tr>
	<td><?php echo $return['id']; ?></td>
	<td><?php echo $return['owneremail']; ?></td>
	<td><?php echo $return['ownerid']; ?></td>
	<td><?php echo $return['createddate']; ?></td>
	<td><?php echo $return['duedate']; ?></td>
	<td><?php echo $return['message']; ?></td>
	<td><button id = "btn" type = "BUTTON"><b> MODIFY</b></button></td>
	<td><button id = "btn" type = "BUTTON"><b> DELETE</b></button></td>
	<td><button id = "btn" type = "BUTTON"><b> COMPLETE</b></button></td>
</tr>

<?php 
	$num_recs++;
	echo "<br>"; } 
	
	echo "<br><br>" . $num_recs . " task(s) found. <br><br>";
?>

<button id = "btn" type = "BUTTON"><b> NEW</b></button>

<?php
	
	//Complete tasks
	echo "<br><br>Completed Tasks: <br><br>";
	$sql = "SELECT * FROM todos WHERE owneremail = :email AND isdone = 1";
	$statement = $conn->prepare($sql);
	$statement->bindValue(':email', $email);
	$statement->execute();
	
	$returns = $statement->fetchAll();
	$statement->closeCursor();
	$num_comp_recs = 0;
	foreach($returns as $return) {

//3. html table*/ fetchall and closecursor
?>

<tr>
	<td><?php echo $return['id']; ?></td>
	<td><?php echo $return['owneremail']; ?></td>
	<td><?php echo $return['ownerid']; ?></td>
	<td><?php echo $return['createddate']; ?></td>
	<td><?php echo $return['duedate']; ?></td>
	<td><?php echo $return['message']; ?></td>
	<td><button id = "btn" type = "BUTTON"><b> MODIFY</b></button></td>
	<td><button id = "btn" type = "BUTTON"><b> DELETE</b></button></td>
	<td><button id = "btn" type = "BUTTON"><b> MARK INCOMPLETE</b></button></td>
</tr>

<?php 
	$num_comp_recs++;
	echo "<br>"; } 
	
	echo "<br><br>" . $num_comp_recs . " task(s) found. <br>";
?>