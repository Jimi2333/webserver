<?php

require_once("conn.php");

$licenseplate = $_POST["licenseplate"];
$passenger = $_POST["passenger"];

$sql = 	"UPDATE vehicle SET passenger = '".$passenger."' WHERE LicensePlate = '".$licenseplate."';";
		
if(mysqli_query($conn, $sql))
{
	echo "Passenger updated";
}
else{
	echo "Update failed.";
}

$conn->close();

?>