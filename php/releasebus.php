<?php

require_once("conn.php");

$licenseplate = $_POST["licenseplate"];

$sql = 	"UPDATE vehicle SET status = 0 WHERE LicensePlate = '".$licenseplate."';";
		
if(mysqli_query($conn, $sql))
{
	echo "Report submitted.";
}
else{
	echo "Update failed.";
}

$conn->close();

?>