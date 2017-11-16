<?php  
require_once("conn.php");
 
$sql = "DELETE FROM temproute WHERE routeid = '".$_POST["routeid"]."';";  
$sql .= "DELETE FROM trip WHERE routeid ='".$_POST["routeid"]."';";  
$sql .= "DELETE FROM routedetailed WHERE routeid ='".$_POST["routeid"]."';";  
$sql .= "DELETE FROM routehead WHERE routeid ='".$_POST["routeid"]."';";  

 if(mysqli_multi_query($conn, $sql))  
 {  
      echo 'Bus route has been deleted';  
	 
 }  
 echo($sql);
 ?>