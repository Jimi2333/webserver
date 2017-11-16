<?php


require_once("conn.php");
$username=$_POST['username'];
$password=$_POST['password'];

$sql = "SELECT UserName, Password FROM 	user";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    			// output data of each row
   	while($row = mysqli_fetch_assoc($result)) {
		if($row ["UserName"]==$username && ($row ["Password"]==$password)){
			echo $row ["Role"];
            }
        else {
            echo "login not success";
             }
		}
	}
			
?>