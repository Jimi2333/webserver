<?php

require_once('VehicleDB.php');

require_once("conn.php");

class Vehicle{
	
	public function getVehicleLicense(){
		

		$query = "SELECT LicensePlate FROM vehicle";
		
		$vehicleLicense = array();
		
        if($result = $conn->query($query)){
	
	        while($obj = $result->fetch_object()){
						
			    $temp_vehicle = new VehicleDB($obj->LicensePlate);
			
		        $vehicleLicense[] = $temp_vehicle;
								
		    }
		
	    }
		
		
		//$vehicleLicense = array("qwe", "qwed", "zzxcv");
		return $vehicleLicense;
    }
}

?>