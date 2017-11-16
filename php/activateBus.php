<?php  
require "conn.php";

$licensePlate= $_POST["licensePlate"];

 $sql = "UPDATE vehicle SET STATUS = '1' WHERE licensePlate = '$licensePlate'";  
 if(mysqli_query($sql))  
 {  
      echo 'Bus status is set to active'; 
 }  
 
 ?>