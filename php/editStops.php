<?php  
require_once("conn.php");
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE stop SET ".$column_name."='".$text."' WHERE stopID='".$id."'";  

 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Updated'; 
 }  
 ?>