<?php 
require "conn.php";
$user_name = $_POST["username"];
$pass_word = $_POST["password"];
$mysql_qry = "select * from user where username like '$user_name' and password like '$pass_word';";

$result = mysqli_query($conn ,$mysql_qry);
//$value = mysql_fetch_array($result);
if(mysqli_num_rows($result) > 0) {
	//$row = mysql_fetch_array($results)
	//$row = mysqli_fetch_assoc($result)
    var_dump($result);
}
else {
echo "Login Failed, Check username and password";
}
?>