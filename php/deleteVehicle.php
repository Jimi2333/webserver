<?php  
require_once("conn.php");

$conn= new mysqli('127.0.0.1', $user, $pass, $dbname);
 $sql = "DELETE FROM fuelup WHERE licenseplate = '".$_POST["id"]."';";  
 $sql .= "DELETE FROM trip WHERE licenseplate = '".$_POST["id"]."';";  
 $sql .= "DELETE FROM maintenance WHERE licenseplate = '".$_POST["id"]."';";  
 $sql .= "DELETE FROM breakdown WHERE licenseplate = '".$_POST["id"]."';";  
 $sql .= "DELETE FROM vehicle WHERE licenseplate = '".$_POST["id"]."';";  


 if(mysqli_multi_query($conn, $sql))  
 {  
      echo 'Vehicle record deleted';  
	 
 }  
 ?>