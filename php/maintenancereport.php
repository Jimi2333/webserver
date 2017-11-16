<?php

require_once("conn.php");

$LicensePlate = $_POST["licenseplate"];
$Cost = (int)$_POST["cost"];
$Description = $_POST["description"];
$Date = date('Y-m-d H:i:s');

$sql = "insert into maintenance 
        (Description, Cost, LicensePlate, Date) 
        values('".$Description."', '".$Cost."' ,'".$LicensePlate."', '".$Date."')";

if(mysqli_query($conn, $sql))
{
	echo "Report submitted.";
}else
{
	echo "Location updating fialed.";
}



$conn->close();

?>