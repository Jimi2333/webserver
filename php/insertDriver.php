<?php  
require_once("conn.php");

 $sql = "INSERT INTO driver(DriverId, FirstName, LastName, username, password) VALUES(DEFAULT,'".$_POST["FirstName"]."','".$_POST["LastName"]."','".$_POST["username"]."', '".$_POST["password"]."')";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 