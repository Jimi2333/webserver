<?php  

		$user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 
 $query = "SELECT status, count(*) as number FROM vehicle GROUP BY status";  
 $result = mysqli_query($conn, $query);  
 
	$sql = "SELECT LicensePlate FROM vehicle ORDER BY LicensePlate";  
	$result2 = mysqli_query($conn, $sql); 

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
		   google.charts.setOnLoadCallback(drawChart2);
          function drawChart() 
           {  
						var data1 = google.visualization.arrayToDataTable([  
                          ['status', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of fleet deployed/stationed',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart1 = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart1.draw(data1, options); 
					
			/*	//second pie chart 
						
				
				
          */ }  
		    
		  function drawChart2() 
           {
			   	var data2 = google.visualization.arrayToDataTable([
					['LicensePlate','Total'],
				<?php
				while($row = mysqli_fetch_array($result2))  {
				$plate = $row["LicensePlate"];
				
				$sql2 = "
				SELECT ifnull(SUM(a.cost), 0) + ifnull(SUM(b.cost), 0) + ifnull(SUM(c.cost), 0)
	FROM (SELECT LicensePlate, ifnull(SUM(cost),0) Cost FROM fuelup group by LicensePlate) a
    Left JOIN (SELECT LicensePlate, ifnull(SUM(cost), 0) Cost FROM maintenance group by LicensePlate) b ON b.licenseplate = a.LicensePlate
    Left JOIN (SELECT LicensePlate, ifnull(SUM(costs),0) Cost FROM breakdown group by LicensePlate) c ON c.LicensePlate = a.LicensePlate
	WHERE a.LicensePlate = '$plate'
	;";
	
	$temp6= mysqli_query($conn,$sql2);
	$costresult= mysqli_fetch_array($temp6);
	
	echo "['".$row["LicensePlate"]."',".$costresult["ifnull(SUM(a.cost), 0) + ifnull(SUM(b.cost), 0) + ifnull(SUM(c.cost), 0)"]."],";
		
					
				}					
				
				?>
				
				]);
				var options = {
					title:'Total cost per vehicle'
				};
				var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
				chart2.draw(data2,options);	
			   }
		  
		  
	
		  
           </script>  
      </head>  
      <body>  
           
           <div style="width:900px;">  
               
               	 
                <div id="piechart2" style="width: 500px; height: 300px;"></div> 
                <div id="piechart" style="width: 500px; height: 300px;"> </div> 
				 
             	<h3>Deployed vehicles</h3>
      </body>  
</html>  