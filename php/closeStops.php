<?php  
require_once("conn.php");
 if($conn){
 $sql = "UPDATE stop SET STATUS = 'Closed' WHERE stopID = '".$_POST["id"]."'";  

 if(mysqli_query($conn, $sql))  
 {  
      echo 'Bus stop status is set to inactive';  
	 
 }  
 }
 ?>