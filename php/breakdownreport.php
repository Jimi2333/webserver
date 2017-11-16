<?php

require_once("conn.php");

$LicensePlate = $_POST["LicensePlate"];
$date = $_POST["date"];
$cost = $_POST["cost"];
$description = $_POST["description"];

$sql = "insert into breakdown (breakdownid, description, LicensePlate, cost, date,) 
                        values(DEFAULT, '".$description."','".$LicensePlate."','".$cost."', '".$date."');";

if(mysqli_query($conn, $sql))
{
	echo "Fuel Up report submitted."
}
else
{
	echo "Submission Failed"

}

?>