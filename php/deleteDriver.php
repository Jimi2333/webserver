<?php  
require_once("conn.php");
 
 $sql = "DELETE FROM trip WHERE Driverid = '".$_POST["id"]."';";  
 $sql .= "DELETE FROM driver WHERE Driverid = '".$_POST["id"]."';";  

 if(mysqli_multi_query($conn, $sql))  
 {  
      echo 'Driver record deleted';  
 } 
 


 ?>