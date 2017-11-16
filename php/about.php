<?php
//include('login.php'); // Includes Login Script

//if(isset($_SESSION['login_user'])){
//header("location: home.php");}

?>
<!DOCTYPE html>
<html>
<head>
<title>About UniShuttle</title>
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
<h1>About UniShuttle System </h1>
<p>Welcome to Unishuttle administrative web application! This application was designed and customized for the Unitecs shuttle service. 
This service is free to students and provides transportation within and between Unitec campus's aswell as the north shore and Mt. Albert train station. 
</p>

<p>Through the use of the data tables provided, this application allows you to edit data necassary for the functioning of the Student UniShuttle Mobile application in addition to gernerating usefull reports. 
</p>

</div>
</body>
</html>
