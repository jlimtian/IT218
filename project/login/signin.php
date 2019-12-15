<?php
//error checking
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function valLogin() {
    
        if(isset($_POST['email']) && isset($_POST['password'])) {        
        $email = $_POST['email'];
        $password = $_POST['password'];
        require("db.php");
            
			
	
        // connect to database
        $sql = "SELECT id, password FROM accounts WHERE email = :email";
        $db = new connection_db();
		$conn = $db->connectDB();
		$run_q = new run_SQL();
        $responses = $run_q->runQuery($sql, $conn, $email);
		foreach($responses as $response) {
			$t_pass = $response['password'];
		}
		
		//$id = $response["id"];

        // check passwords
        if(password_verify($_POST['password'] , $t_pass)) {
        // Put target page here
        //header('show.php');
        }
        else {
            echo 'Incorrect Login';
        }    
    }
}
valLogin();
?>
