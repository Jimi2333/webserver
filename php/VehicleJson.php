<?php

//header('Content-Type: application/json');

require_once('VehicleDB.php');

require_once("conn.php");

if (mysqli_connect_errno()) {

    printf("Connect failed: %s\n", mysqli_connect_error());

    exit();

}

$query = "SELECT LicensePlate, Model, status, longitude, latitude FROM vehicle";

$vehicle_array = array();

if($result = $conn->query($query)){
	
	while($obj = $result->fetch_object()){
		
		//printf("%s %s %s %s %s <br />", 
		     // $obj->LicensePlate, $obj->Model, $obj->status, $obj->longitude, $obj->latitude);
			
			$temp_vehicle = new VehicleDB(
			$obj->LicensePlate, $obj->Model, 
			$obj->status, $obj->longitude, 
			$obj->latitude);
			
		    $vehicle_array[] = $temp_vehicle;	
		}

	 //echo "<br /><br />";

    echo '{"vehicle":[';

    $dale_data = json_encode($vehicle_array[0]);
    echo $dale_data;

    echo ',<br />';

    $dale_data = json_encode($vehicle_array[1]);

    echo $dale_data . "<br />";

    echo ']}';

	$result->close();
	$conn->close();
}

?>