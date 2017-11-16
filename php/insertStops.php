<?php  
require_once("conn.php");

 $sql = "INSERT INTO Stop(Longitude, Latitude) VALUES('".$_POST["Longitude"]."', '".$_POST["Latitude"]."')";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 