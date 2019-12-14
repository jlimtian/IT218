<?php
	require 'db.php' ;
	$sql = "SELECT id, owneremail, title, createddate, duedate, message FROM todos WHERE owneremail = :email AND isdone = 0";
	$email = "janedoe@njit.edu";
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$returns = $run_q->runQuery($sql, $conn, $email);

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
	
	
	$num_recs = 0;
	echo "Incomplete Tasks: <br><br>";
	echo "<table border=\"0\"><tr><th>ID</th><th>Owner Email</th><th>Title</th><th>Date Created</th><th>Date Due</th><th>Message</th></tr>";
	foreach($returns as $return) {
?>

<tr>
	<td><?php echo $return['id']; ?></td>
	<td><?php echo $return['owneremail']; ?></td>
	<td><?php echo $return['title']; ?></td>
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
	
	$sql = "SELECT id, owneremail, title, createddate, duedate, message FROM todos WHERE owneremail = :email AND isdone = 1";
	$results = $run_q->runQuery($sql, $conn, $email);
	echo "Complete Tasks: <br><br>";
	
	$num_comp_recs = 0;
	
	echo "<table border=\"0\"><tr><th>ID</th><th>Owner Email</th><th>Title</th><th>Date Created</th><th>Date Due</th><th>Message</th></tr>";
	foreach($returns as $return) {

?>

<tr>
	<td><?php echo $return['id']; ?></td>
	<td><?php echo $return['owneremail']; ?></td>
	<td><?php echo $return['title']; ?></td>
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
