<?php
//error checking
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function valLogin() {
    
        if(isset($_POST['email']) && isset($_POST['password'])) {        
        $email = $_POST['email'];
        $password = $_POST['password'];
        require("db.php");
            
			
	
        // connect to database
        $sql = "SELECT id, password, email FROM accounts WHERE email = :email";
        $db = new connection_db();
		$conn = $db->connectDB();
		$run_q = new run_SQL();
        $responses = $run_q->runQuery($sql, $conn, $email);
		foreach($responses as $response) {
			$t_pass = $response['password'];
			$t_email = $response['email'];
			$id = $response["id"];
		}

        // check passwords
        if(($password == $t_pass) and ($email == $t_email)) {
        $_SESSION["id"] = $id;
        header("refresh: 0, url='show.php'");
        }
        else {
            echo 'Incorrect Login';
        }    
    }
}
valLogin();
?>
