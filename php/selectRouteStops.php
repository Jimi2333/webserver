
<?php

require_once("conn.php"); 
$output = '';  
$outputStops = ''; 
$sql = "SELECT routestopID, stopID, RouteSeq, TravelDistance FROM routedetailed WHERE RouteID IN (SELECT routeid from temproute) ORDER BY RouteSeq;";  
$whichRoute = "SELECT routeid from temproute";
$thisRoute = mysqli_query($conn, $whichRoute);

while($row = mysqli_fetch_array($thisRoute)){
	$output .= '
			<div class="table-responsive">  
			<table class="table table-bordered">  
                <tr>  
                     <th bgcolor = "#d6d6c2" width="12%">Updateing route: </th>  
					 <th width="40%">'.$row['routeid'].'</th>  
					  
                </tr>';
};


$result = mysqli_query($conn, $sql);

$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th bgcolor = "#d6d6c2" width="7%">routeStopID</th>  
                     <th bgcolor = "#d6d6c2" width="10%">stopID</th>  
					 <th bgcolor = "#d6d6c2" width="10%">Route Sequence</th>
                     <th bgcolor = "#d6d6c2" width="10%">Delete</th>  
					  
                </tr>';  
				
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
		   <td>'.$row["routestopID"].'</td>  
                    <td class="stopID" id ="stopID" data-id1="'.$row["routestopID"].'">'.$row["stopID"].'</td>
					<td class="RouteSeq" data-id2="'.$row["routestopID"].'" contenteditable>'.$row["RouteSeq"].'</td> 
					
                    <td><button type="button"  name="delete_btn" data-id4="'.$row["routestopID"].'" class="btn center-block btn-xs btn-danger btn_delete">x</button></td> 
					 
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
 
 
 
 
 $output .= '</table>  


      </div>';  
 echo $output;  
 
 
 /////output two for stops table///////////////////////////////////////////////////
  
 $sql = "SELECT stopID, Longitude, Latitude FROM stop WHERE status LIKE 'OPEN' ORDER BY stopID DESC";  

 $result = mysqli_query($conn, $sql);  
 echo "<font size=5><div align=center> Select stop to add to route</div>";
 $outputStops .= '  
      <div class="table-responsive">  
	  
           <table class="table table-bordered">  
		 
                <tr> 
                     <th bgcolor = "#d6d6c2" width="10%">stopID</th>  
                     <th bgcolor = "#d6d6c2" width="40%">Longitude</th>  
					 <th bgcolor = "#d6d6c2" width="27%">Latitude</th>  
                     <th bgcolor = "#d6d6c2" width="30%">Add Stop</th>  
                </tr>';  
				
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $outputStops .= '
		   <td>'.$row["stopID"].'</td>  
                     <td class="Longitude" data-id5="'.$row["stopID"].'" contenteditable>'.$row["Longitude"].'</td> 
					 <td class="Latitude" data-id6="'.$row["stopID"].'" contenteditable>'.$row["Latitude"].'</td>  					 
                     <td><button type="button" name="btn_addstop" data-id7="'.$row["stopID"].'" id="btn_addstop" 

class="btn center-block btn-xs btn-success">+</button></td> 
                </tr>  
           ';  
      }  
      $outputStops .= '  
           <tr>  
                
           </tr>  
      ';  
 }  
 else  
 {  
      $outputStops .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 
 $outputStops .= '</table>  


      </div>';  
 echo $outputStops;  
 
 
 
 
 
 
 
 ?>