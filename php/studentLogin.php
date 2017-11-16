<?php 
require "conn.php";
$user_name = $_POST["username"];
$pass_word = $_POST["password"];
$mysql_qry = "select * from students where username like '$user_name' and password like '$pass_word';";
$result = mysqli_query($conn ,$mysql_qry);
if(mysqli_num_rows($result) > 0) {
echo "Login Success";
}
else {
echo "Login Failed";
}
 
?>