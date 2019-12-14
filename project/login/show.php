<?php
	require 'db.php' ;
	$sql = "SELECT id, owneremail, title, createddate, duedate, message FROM todos WHERE owneremail = :email AND isdone = 0";
	$email = "janedoe@njit.edu";
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$results = $run_q->runQuery($sql, $conn, $email);

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
	
	echo "Incomplete Tasks: <br><br>";
	if(count($results) > 0)
	{
		echo "<table border=\"0\"><tr><th>ID</th><th>Owner Email</th><th>Title</th><th>Date Created</th><th>Date Due</th><th>Message</th></tr>";
		foreach ($results as $row) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["owneremail"]."</td><td align='center'>".$row["title"]."</td><td>".$row["createddate"]."</td><td>".$row["duedate"]."</td><td>".$row["message"]."</td><td><button id = 'btn' type = 'BUTTON'><b> MODIFY</b></button></td><td><button id = 'btn' type = 'BUTTON'><b> DELETE</b></button></td><td><button id = 'btn' type = 'BUTTON'><b> MARK COMPLETE</b></button></td></tr>";
		}
		
	}else{
		echo '0 results';
	}
	
	$sql = "SELECT id, owneremail, title, createddate, duedate, message FROM todos WHERE owneremail = :email AND isdone = 1";
	$results = $run_q->runQuery($sql, $conn, $email);
	
	if(count($results) > 0)
	{
		echo "Complete Tasks: <br><br>";
		echo "<table border=\"0\"><tr><th>ID</th><th>Owner Email</th><th>Title</th><th>Date Created</th><th>Date Due</th><th>Message</th></tr>";
		foreach ($results as $row) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["owneremail"]."</td><td align='center'>".$row["title"]."</td><td>".$row["createddate"]."</td><td>".$row["duedate"]."</td><td>".$row["message"]."</td><td><button id = 'btn' type = 'BUTTON'><b> MODIFY</b></button></td><td><button id = 'btn' type = 'BUTTON'><b> DELETE</b></button></td><td><button id = 'btn' type = 'BUTTON'><b> MARK INCOMPLETE</b></button></td></tr>";
		}
		
	}else{
		echo '0 results';
	}
?>