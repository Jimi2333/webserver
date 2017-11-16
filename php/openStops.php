<?php  
require_once("conn.php");
 if($conn){
 $sql = "UPDATE stop SET STATUS = 'OPEN' WHERE stopID = '".$_POST["id"]."'";  
 //echo $sql; 
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Bus stop status is set to active';  
	 
 }  
 }
 ?>