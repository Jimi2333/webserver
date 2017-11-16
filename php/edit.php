<?php  
require_once("conn.php");

 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE administrator SET ".$column_name."='".$text."' WHERE Adminid='".$id."'";  

 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Updated'; 
 }  
 ?>