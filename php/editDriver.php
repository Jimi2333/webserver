<?php  
require_once("conn.php"); 
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE Driver SET ".$column_name."='".$text."' WHERE DriverID='".$id."'";  

 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Updated'; 
 }  
 ?>