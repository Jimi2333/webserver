<?php  
require_once("conn.php");

 $sql = "INSERT INTO administrator(adminId, username, password) VALUES(DEFAULT,'".$_POST["username"]."', '".$_POST["password"]."')";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 