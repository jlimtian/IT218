<?php
	require 'db.php' ;
	
	$sql = "SELECT id, owneremail, ownerid FROM todos WHERE owneremail = :email";
	$email = "janedoe@njit.edu"; //fix
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$returns = $run_q->runQuery($sql, $conn, $email);
	
	//$email = "janedoe@njit.edu"; change to $_POST
	

	$timedue = $_POST["timedue"];
	$title = $_POST["title"];
	$dated = $_POST["datedue"];
	$datedue = $dated . " " . $timedue;
	$note = $_POST['description'];
	foreach ($returns as $return){
		$idVal = $return['id'] + 1;
		$ownID = $return['ownerid'];
	}
	
	//echo $idVal . " " . $ownID;
	
	$sql = "INSERT INTO todos VALUES (:idVal, :email, :ownID, :title, NOW(), :datedue, :message, 0)";
	
	//$sql = "INSERT INTO todos VALUES (8, :email, 10, :title, NOW(), '2019-11-08 01:02:00', :message, 0)";
	
	$returns = $run_q->runSQLQuery($sql, $conn, $idVal, $email, $ownID, $title, $datedue, $note);
?>
