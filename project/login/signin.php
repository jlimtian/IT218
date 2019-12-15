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
        $sql = "select password, id from `accounts` where email=:email";
        $db = new connection_db();
		$conn = $db->connectDB();
		$run_q = new run_SQL();
        $response = $run_q->runQuery($sql, $conn, $email);
		$id = $response["id"];
        // check passwords
        if(password_verify($_POST['password'] , $response['password'])) {
        // Put target page here
        // header('../show.php');
        }
        else {
            echo 'Incorrect Login';
        }    
    }
}
valLogin();
?>
