<?php  
require_once("conn.php");
 $routestopID = $_POST["id1"];  
 $seq = $_POST["Sequence"];  

 
$sql = "UPDATE routedetailed SET RouteSeq ='".$seq."' WHERE routestopid='".$routestopID."'";  

 if(mysqli_query($conn, $sql))  
 {  
      echo 'Stop sequence updated'; 
 }  
 ?>