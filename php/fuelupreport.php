<?php

require_once("conn.php");

$LicensePlate = $_POST["licenseplate"];
$Cost = (int)$_POST["cost"];
$Date = date('Y-m-d H:i:s');

$sql = "insert into fuelup 
        (Cost, LicensePlate, Date) 
        values('".$Cost."' ,'".$LicensePlate."', '".$Date."')";

if(mysqli_query($conn, $sql))
{
	echo "Report submitted.";
}

$conn->close();

?>