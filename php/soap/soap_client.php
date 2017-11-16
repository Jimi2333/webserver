<?php

$options = array("location" =>
                "https://unishuttle.co.nz/soap/soap_service.php"
				"uri" => "https://unishuttle.co.nz");
				
try{
	
	$client = new SoapClient(null, $options);
	
	$vehicle = $client->getVehicleLicense;
	
	echo $vehicle;
}

catch(SoapFault $ex){
	
	var_dump($ex);
}

?>