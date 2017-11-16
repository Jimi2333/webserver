
<?php

$user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 

// $connect = mysqli_connect("localhost", "root", "", "test_db");  
 $output = '';  
 //$sql = "SELECT * FROM tbl_sample 
$sql = "SELECT LicensePlate, Make, Model, Type, Year, Capacity, Status FROM vehicle ORDER BY LicensePlate DESC";  

 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                    
                     <th bgcolor = "#d6d6c2" width="40%">Lisence Plate No.</th>  
					 <th bgcolor = "#d6d6c2" width="40%">Make</th>
                     <th bgcolor = "#d6d6c2" width="40%">Model</th> 
					<th bgcolor = "#d6d6c2" width="40%">Type</th>
					<th bgcolor = "#d6d6c2" width="40%">Year</th>
					<th bgcolor = "#d6d6c2" width="40%">Capacity</th>
					<th bgcolor = "#d6d6c2" width="10%">Status</th>
                     <th bgcolor = "#d6d6c2" width="10%">Delete</th>  
                </tr>';  
				/*<td>'.$row["LicensePlate"].'</td>  */
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
		    
                     <td class="LicensePlate" data-id1="'.$row["LicensePlate"].'">'.$row["LicensePlate"].'</td>
                     <td class="Make" data-id2="'.$row["LicensePlate"].'" >'.$row["Make"].'</td> 
					<td class="Model" data-id3="'.$row["LicensePlate"].'" >'.$row["Model"].'</td> 	
					<td class="Type" data-id4="'.$row["LicensePlate"].'" >'.$row["Type"].'</td>
					<td class="Year" data-id5="'.$row["LicensePlate"].'" >'.$row["Year"].'</td>
					  <td class="Capacity" data-id6="'.$row["LicensePlate"].'" >'.$row["Capacity"].'</td> 
					    <td class="Status" data-id7="'.$row["LicensePlate"].'" >'.$row["Status"].'</td> 
                     <td><button type="button" name="delete_btn" data-id8="'.$row["LicensePlate"].'" class="btn center-block btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
               
               <td id="LicensePlate" contenteditable></td>
			    <td id="Make" contenteditable></td> 
                <td id="Model" contenteditable></td>
				 <td id="Type" contenteditable></td>
				 <td id="Year" contenteditable></td> 
				  <td id="Capacity" contenteditable></td> 
				   <td id="Status" contenteditable></td> 
                <td><button type="button" name="btn_add" id="btn_add" 

class="btn center-block btn-xs btn-success">+</button></td>  
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


      </div>';  
 echo $output;  
 ?>