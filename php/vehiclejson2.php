<?php

require_once("conn.php");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}		
	
		$conn->query("SET NAMES 'utf8'");
		$sql="SELECT * FROM vehicle";
		$result=$conn->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	


		
		header('Content-Type: application/json');
	    echo json_encode(array("vehicles"=>$output));
		$conn->close();	

		?>