<?php  
require_once("conn.php");
 
 $sql = "DELETE FROM administrator WHERE Adminid = '".$_POST["id"]."'"; 
 
 
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Deleted';  
	 
 }  
 ?>
