<?php
//error checking
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['email']) 
		&& isset($_POST['password'])
		&& isset($_POST['confirm'])){
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $college = $_POST['college'];
        $major = $_POST['major'];
		$user = $_POST['email'];
		$pass = $_POST['password'];
		$confirm = $_POST['confirm'];
		if($pass != $confirm){
				echo "Passwords don't match";
				exit();
        }
        
        try{
			// passward hashing - optional
			// $hash = password_hash($pass, PASSWORD_BCRYPT);
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("INSERT into `accounts` (`fname`, `lname`, `college`, 
                `major`, `email`, `password`) 
                VALUES(:fname, :lname, :college, :major, :email, :password)");
			$response = $stmt->execute(
                array(":fname"=>$fname,
                    ":lname"=>$lname,
                    ":college"=>$college,
                    ":major"=>$major,
                    ":email"=>$user,
                    ":password"=>$pass
				)
			);
			print_r($stmt->errorInfo());
			
			// echo var_export($response, true);
			header('Location: login.php');
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
?>
