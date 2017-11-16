<?php 
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {

	if (empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password is invalid";
	}
		else{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
	

		$user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 

			//if(!$conn){
			//die ("Unable to connect to datababse");
			//}
			//echo"connected to database";






		$sql = "SELECT UserName, Password FROM 	administrator";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
    			// output data of each row
   		 	while($row = mysqli_fetch_assoc($result)) {
				if($row ["UserName"]==$username && ($row ["Password"]==$password)){
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: home.php"); // Redirecting To Other Page
					}
				}
			}
			 else {
    			$error = "Username or Password is invalid";
			}




mysqli_close($conn);


	}
}
?>