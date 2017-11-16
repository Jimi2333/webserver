<?php  
require_once("conn.php");
 
 $sql = "DELETE FROM routedetailed WHERE stopid = '".$_POST["id"]."';";  
 $sql .= "DELETE FROM stop WHERE stopid = '".$_POST["id"]."';";  
 

 if(mysqli_multi_query($conn, $sql))  
 {  
      echo 'Bus stop has been deleted';  
	 
 }  
 ?>