<?php
	require 'db.php';
	$idVal = $_POST['inter'];
	$sql = "SELECT * FROM todos WHERE id = :idVal";
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$returns = $run_q->runDeleteQuery($sql, $conn, $idVal);
	
	
	echo "<table border=\"0\"><tr><th>ID</th><th>Owner Email</th><th>Title</th><th>Date Created</th><th>Date Due</th><th>Message</th></tr>";
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
	$num_recs++;
	echo "<br>"; }
	
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
