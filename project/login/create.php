<?php
	$email = $_POST['mid'];
	require 'db.php' ;
	
	$sql = "SELECT id, owneremail, ownerid FROM todos WHERE owneremail = :email";
	
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$returns = $run_q->runQuery($sql, $conn, $email);

	$timedue = $_POST["timedue"];
	$title = $_POST["title"];
	$dated = $_POST["datedue"];
	$datedue = $dated . " " . $timedue;
	$note = $_POST['description'];
	foreach ($returns as $return){
		$idVal = $return['id'] + 1;
		$ownID = $return['ownerid'];
	}
	
	$sql = "INSERT INTO todos VALUES (:idVal, :email, :ownID, :title, NOW(), :datedue, :message, 0)";
	
	$returns = $run_q->runSQLQuery($sql, $conn, $idVal, $email, $ownID, $title, $datedue, $note);
	header("refresh: 0, url='show.php'");
	exit();
?>
