<?php  
require_once("conn.php");

 $sql = "INSERT INTO routehead(RouteId, Description) VALUES(DEFAULT,'".$_POST["Description"]."')";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'New bus route inserted';  
 }  
 ?> 