<?php  
require_once("conn.php");
 if($conn){
 $sql = "DELETE FROM routedetailed WHERE routestopid = '".$_POST["id"]."'";   
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Bus stop has been deleted';   
 }  
 }
 ?>