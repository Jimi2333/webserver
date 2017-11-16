<?php

require_once('VehicleDB.php');

require_once("conn.php");


if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}		

		$conn->query("SET NAMES 'utf8'");
		$sql="SELECT LicensePlate FROM vehicle WHERE STATUS LIKE 0";
		$result=$conn->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

		print(json_encode($output)); 
		$conn->close();	

		?>		