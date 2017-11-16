<?php
$user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 
 $date1 = $_POST["date1"]; 
 $date2 = $_POST["date2"]; 

 $output = '';  
$sql = "SELECT LicensePlate FROM vehicle ORDER BY LicensePlate";  

$output .= '
			<div class="table-responsive">  
			<table class="table table-bordered">  
                <tr>  
                     <th bgcolor = "#d6d6c2" width="20%">Date range: </th> 
						<th width="20%">'.$date1.'</th>  					 
						<th width="20%">'.$date2.'</th>  
					  
                </tr>';




 $result = mysqli_query($conn, $sql);  

 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
		   
                <tr>  
                     <th width="5%" bgcolor = "#d6d6c2">vehicle</th>  
					 <th width="5%" bgcolor = "#d6d6c2">Maintenance costs</th>  
                     <th width="8%" bgcolor = "#d6d6c2">Fuel</th>  
                     <th width="8%" bgcolor = "#d6d6c2">Breakdown costs</th>  
                     <th width="10%" bgcolor = "#d6d6c2">No. of trips</th>  
                     <th width="12%" bgcolor = "#d6d6c2">Cost per km</th>  
					 <th width="18%" bgcolor="#808080">Total vehicle cost</th>  
                </tr>';
		
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
		
		$plate = $row["LicensePlate"];
		$maintencecost = "SELECT ifnull(SUM(cost),0) from maintenance WHERE LicensePlate = '$plate' AND date BETWEEN '$date1' AND '$date2'";
		$fuelcost = "SELECT ifnull(SUM(cost),0) from fuelup WHERE LicensePlate = '$plate' AND date BETWEEN '$date1' AND '$date2'";
		$breakcost = "SELECT ifnull(SUM(costs),0) from breakdown WHERE LicensePlate = '$plate' AND date BETWEEN '$date1' AND '$date2'";
		$trips = "SELECT COUNT(*) from trip WHERE LicensePlate = '$plate' AND date BETWEEN '$date1' AND '$date2'";
		$kmcost = "SELECT ROUND(SUM(DistanceTravelled))/ ROUND(SUM(cost)) from trip a, fuelup b 
		WHERE a.LicensePlate = '$plate' AND b.LicensePlate = '$plate'
		AND a.Date BETWEEN '$date1' AND '$date2'
		AND b.Date BETWEEN '$date1' AND '$date2'
		"; 
		
		
	$totalcost = "
	SELECT ifnull(SUM(a.cost), 0) + ifnull(SUM(b.cost), 0) + ifnull(SUM(c.cost), 0) 
	FROM (SELECT LicensePlate, ifnull(SUM(cost),0) Cost FROM fuelup WHERE Date BETWEEN '$date1' AND '$date2' group by LicensePlate) a
    Left JOIN (SELECT LicensePlate, ifnull(SUM(cost), 0) Cost FROM maintenance WHERE Date BETWEEN '$date1' AND '$date2' group by LicensePlate) b ON b.licenseplate = a.LicensePlate
    Left JOIN (SELECT LicensePlate, ifnull(SUM(costs),0) Cost FROM breakdown WHERE Date BETWEEN '$date1' AND '$date2' group by LicensePlate) c ON c.LicensePlate = a.LicensePlate
	WHERE a.LicensePlate = '$plate'
	;";
		
		
		
		
		
		$temp1 = mysqli_query($conn,$maintencecost);
		$costresult1 =mysqli_fetch_array($temp1);
		
		$temp2 = mysqli_query($conn,$fuelcost);
		$costresult2 =mysqli_fetch_array($temp2);
		
		$temp3 = mysqli_query($conn,$breakcost);
		$costresult3 =mysqli_fetch_array($temp3);
		
		$temp4 = mysqli_query($conn,$trips);
		$costresult4 =mysqli_fetch_array($temp4);
		
		$temp5 = mysqli_query($conn,$kmcost);
		$costresult5 =mysqli_fetch_array($temp5);
		
		$temp6= mysqli_query($conn,$totalcost);
		$costresult6= mysqli_fetch_array($temp6);
		
		
           $output .= '
					<td>'.$row["LicensePlate"].'</td>
			 		<td>'.$costresult1["ifnull(SUM(cost),0)"].'</td>
					<td>'.$costresult2["ifnull(SUM(cost),0)"].'</td>
					<td>'.$costresult3["ifnull(SUM(costs),0)"].'</td>
					<td>'.$costresult4["COUNT(*)"].'</td>
					<td>'.$costresult5["ROUND(SUM(DistanceTravelled))/ ROUND(SUM(cost))"].'</td>
					<td>'.$costresult6["ifnull(SUM(a.cost), 0) + ifnull(SUM(b.cost), 0) + ifnull(SUM(c.cost), 0)"].'</td>
					
                   
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
            
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 
 $output .= '</table>  
  <a href="#" onclick="window.print();return false;">Print this page</a>
      </div>';  
	  
 echo $output;  


 ?>