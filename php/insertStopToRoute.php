<?php  
require_once("conn.php");
$route = "select routeid from temproute";

$route2 = mysqli_query($conn,$route);

$routeid =mysqli_fetch_array($route2);

$sql = "INSERT INTO routedetailed(RouteId, stopid, Routeseq) VALUES('".$routeid["routeid"]."','".$_POST["stopID"]."', '".$_POST["seq"]."')"; 

 if(mysqli_query($conn, $sql))  
 {  
      echo 'New bus stop inserted';  
 }  
 else{ echo 'error: duplicate bus stop';
	echo $sql; }
 ?> 