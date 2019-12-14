<?php
	require 'db.php' ;
	$sql = "SELECT id FROM accounts WHERE username = :user and password = :pass";
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$results = $run_q->runSQLQuery($sql, $conn, $email, $title, $datecreate, $datedue, $note);
	
	
	$sql = "UPDATE todos SET owneremail = :email, title = :title, createdate, duedate, message, isdone) VALUES ( , :email, :title, :datecreate, :datedue, :message, 0";
	$email = "janedoe@njit.edu"; //change to $_POST
	//$datecreate = $timedue = $title = $dated = $datedue = $note = '';
	
	$datecreate = date('Y-m-d', time());
	$timedue = $_POST["timedue"];
	$title = $_POST["title"];
	$dated = $_POST["datedue"];
	$datedue = date('$dated', $timedue);
	$note = $_POST['description'];
	
	if (isset($title)){$sql .= ", title = :title"}
	
	
	$sql .= " WHERE ownerid = :ownID AND id = :idVal)"; //just id then?
	
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$results = $run_q->runSQLQuery($sql, $conn, $email, $title, $datecreate, $datedue, $note);
?>