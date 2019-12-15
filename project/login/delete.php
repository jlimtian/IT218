<?php
	require 'db.php' ;
	$sql = "DELETE FROM todos WHERE id = :idVal";
	$idVal = $_POST['btndel'];
	
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$results = $run_q->runDeleteQuery($sql, $conn, $idVal);
	
	header("refresh: 0, url='show.php'");
	exit();
?>
