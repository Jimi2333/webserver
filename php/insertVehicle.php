<?php  
require_once("conn.php");

 $sql = "INSERT INTO vehicle(LicensePlate, Make, Model, Type, Year, Capacity) VALUES('".$_POST["licensePlate"]."', '".$_POST["Make"]."', '".$_POST["Model"]."', '".$_POST["Type"]."','".$_POST["Year"]."', '".$_POST["Capacity"]."')";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'New vehicle record created';  
 }  
 echo($sql);
 ?> 