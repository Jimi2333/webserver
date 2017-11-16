<?php

require_once("conn.php");

$longitude = $_POST["longitude"];
$latitude = $_POST["latitude"];
$licenseplate = $_POST["licenseplate"];



$sql = 	"UPDATE vehicle SET latitude = '".$latitude."',longitude ='".$longitude."' WHERE LicensePlate = '".$licenseplate."';";
		
if(mysqli_query($conn, $sql))
{
	echo "Report submitted.";
	echo($sql);
}
else{
	echo "Update failed.";
}

$conn->close();

?>