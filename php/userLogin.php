<?php


		$username=$_POST['username'];
		$password=$_POST['password'];
        $user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 

		$sql = "SELECT UserName, Password FROM 	administrator";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
    			// output data of each row
   		 	while($row = mysqli_fetch_assoc($result)) {
				if($row ["UserName"]==$username && ($row ["Password"]==$password)){
					echo "login success !!!!! Welcome" $username;
                }
             else {
                    echo "login not success";
                  }
				}
			}
			
?>