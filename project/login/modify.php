<?php
	require 'db.php';
	$idVal = $_POST['inter'];
	$sql = "SELECT * FROM todos WHERE id = :idVal";
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$returns = $run_q->runDeleteQuery($sql, $conn, $idVal);
	
	$sql = "UPDATE todos SET id = :idVal, owneremail = :email";
	$timedue = $title = $dated = $note = '';
	
	foreach ($returns as $return){
		$ownID = $return['ownerid'];
		$email = $return['owneremail'];
		$datedue = $return['createddate'];
	}
	$timedue = $_POST["timedue"];
	$title = $_POST["title"];
	$dated = $_POST["datedue"];
	$note = $_POST['description'];
	
	$splitDate = explode(" ", $datedue);
	$ddate = $splitDate[0];
	$tdate = $splitDate[1];
	
	if ($title != ''){$sql .= ", title = :title";}
	else {foreach ($returns as $return){$title = $return['title'];} $sql .= ", title = :title";}
	if ($note != ''){$sql .= ", message = :message";}
	else {foreach ($returns as $return){$note = $return['message'];} $sql .= ", message = :message";}
	
	if (($dated != '') and ($timedue != '')){
		$datedue = $dated . " " . $timedue;
		$sql .= ", duedate = :datedue";
	}
	elseif (($dated != '') and ($timedue == '')){
		$datedue = $dated . " " . $tdate;
		$sql .= ", duedate = :datedue";
	}
	else {
		$datedue = $ddate . " " . $timedue;
		$sql .= ", duedate = :datedue";
	}
	
	
	$checked = $_POST['complete'];
	
	echo $checked . "<br>";
	if(!isset($checked) && $checked != 'complete'){
		$sql .= ", isdone = 0";
	}
	else {
		$sql .= ", isdone = 1";
	}
	
	$sql .= " WHERE id = :idVal";
	
	echo $sql;
	
	$returns = $run_q->runSQLQuery($sql, $conn, $idVal, $email, $ownID, $title, $datedue, $note);
	header("refresh: 0, url='show.php'");
	exit();
?>
