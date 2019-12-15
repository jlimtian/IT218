<?php
class data_connect{
	function http_error($message) 
	{
		header("Content-type: text/plain");
		die($message);
	}
}
	
class connection_db{
	
	private $hostname = "sql1.njit.edu";
	private $username = "jl863";
	private $password = "8.~A#k/A]";
	private $dbname = "jl863";
	public $conn = NULL;
	
	public function connectDB(){
		try 
		{
			$this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
			if($this->conn != null){echo "";}
		}
		catch(PDOException $e)
		{
			$error_out = new report_error();
			$error_out->http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
		}
		return $this->conn;
	}
}

class run_SQL{	
	function runQuery($query, $conn, $email) {
		try {
			$q = $conn->prepare($query);
			$q->bindValue(':email', $email);
			$q->execute();
			$results = $q->fetchAll();
			$q->closeCursor();
			return $results;	
		} catch (PDOException $e) {
			$error_out = new report_error();
			$error_out->http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
		}	
	}
	
	function runSQLQuery($query, $conn, $idVal, $email, $ownID, $title, $datedue, $note) {
		try {
			$q = $conn->prepare($query);
			$q->bindValue(':idVal', $idVal);
			$q->bindValue(':email', $email);
			$q->bindValue(':ownID', $ownID);
			$q->bindValue(':title', $title);
			$q->bindValue(':datedue', $datedue);
			$q->bindValue(':message', $note);
			$q->execute();
			$results = $q->fetchAll();
			$q->closeCursor();
			return $results;	
		} catch (PDOException $e) {
			$error_out = new report_error();
			$error_out->http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
		}	
	}
	
	function runDeleteQuery($query, $conn, $idVal) {
		try {
			$q = $conn->prepare($query);
			$q->bindValue(':idVal', $idVal);
			$q->execute();
			$results = $q->fetchAll();
			$q->closeCursor();
			return $results;
		} catch (PDOException $e) {
			$error_out = new report_error();
			$error_out->http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
		}	
	}
}

?>
