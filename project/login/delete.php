<?php
	require 'db.php' ;
	$sql = "DELETE FROM todos WHERE id = :idVal)";
	$idVal = 1; //this needs to be gotten from somewhere
	
	$db = new connection_db();
	$conn = $db->connectDB();
	$run_q = new run_SQL();
	$results = $run_q->runDeleteQuery($sql, $conn, $idVal);
?>