
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<!--<meta charset="utf-8">-->
		

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
		
		
		
		<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="maintaindriver.html">Update Drivers</a></li>
		<li><a href="maintainvehicle.html">Update Vehicles</a></li>
		<li><a href="maintainroutes.html">Update Route</a></li>
		<li><a href="maintainadmin.html">Update Admin</a></li>
		<li><a href="utilisationReport.html">Utilisation Report</a></li>
		<li><a  href="logout.php">Log Out</a></li>
		</ul>
		
	</head>

	<body>
	<div id="main">
	<h1>Welcome to UniShuttle Administrator Tool</h1>
	

	
	<!--<div id = "piechart" style="width:900px; hight: 500px;"></div>-->
	
	</body>
	 
		   
             
</html>
<?php
include('piechart.php');

		$user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 
$output = '';  



 
$sql = "Select d.LicensePlate, s.Description, s2.FirstName, s2.LastName, s2.PhoneNo
		FROM trip as d
        Join Routehead as s On d.routeid = s.routeid
		Join driver as s2 on s2.driverid = d.driverid
		WHERE d.status = 1
		";  
$result = mysqli_query($conn, $sql);
 $output .= '  
 
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%" bgcolor = "#d6d6c2">Vehicle</th>  
					  <th width="10%" bgcolor = "#d6d6c2">Route</th>  
					 <th width="10%" bgcolor = "#d6d6c2">Driver First Name</th>  
					 <th width="10%" bgcolor = "#d6d6c2">Driver Surname</th>
                     <th width="10%" bgcolor = "#d6d6c2">Phone No.</th>  
					  
                </tr>
			</div>';  

 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
		   <td bgcolor = "#99ff66">'.$row["LicensePlate"].'</td>  
		    <td class="stopID" id ="Description" data-id1="'.$row["LicensePlate"].'">'.$row["Description"].'</td>
                    <td class="FirstName" id ="stopID" data-id1="'.$row["LicensePlate"].'">'.$row["FirstName"].'</td>
					 <td class="LastName" id ="stopID" data-id1="'.$row["LicensePlate"].'">'.$row["LastName"].'</td>
					<td class="PhoneNo" data-id2="'.$row["LicensePlate"].'" contenteditable>'.$row["PhoneNo"].'</td> 
                </tr>  
           ';  
      }  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 
 
 
 
			
				echo $output;
?>