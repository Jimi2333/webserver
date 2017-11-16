<?php  
require_once("conn.php");
 $id = $_POST["id"];  

 $sql = "UPDATE temproute SET routeid ='".$id."'";  

 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Updated'; 
 }  
 ?>