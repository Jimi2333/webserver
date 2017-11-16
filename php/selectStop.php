
<?php

$user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 
// $connect = mysqli_connect("localhost", "root", "", "test_db");  
 $output = '';  
 //$sql = "SELECT * FROM tbl_sample 
$sql = "SELECT stopID, Longitude, Latitude, status FROM stop ORDER BY stopID";  

 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th bgcolor = "#d6d6c2" width="10%">Stop Id</th>  
                     <th bgcolor = "#d6d6c2" width="40%">Longitude</th>  
					 <th bgcolor = "#d6d6c2" width="40%">Latitude</th>  
					 <th bgcolor = "#d6d6c2" width="10%">Status</th>
					 <th bgcolor = "#d6d6c2" width="10%">Delete</th>
                     <th bgcolor = "#d6d6c2" width="10%">Close</th>  
					 <th bgcolor = "#d6d6c2" width="10%">Open</th> 
                </tr>';  
				
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
		   <td>'.$row["stopID"].'</td>  
                     <td class="Longitude" data-id1="'.$row["stopID"].'" contenteditable>'.$row["Longitude"].'</td> 
					<td class="Latitude" data-id2="'.$row["stopID"].'" contenteditable>'.$row["Latitude"].'</td>
					<td class="Status" data-id3="'.$row["stopID"].'" contenteditable>'.$row["status"].'</td>				
					<td><button type="button" name="delete_btn" data-id4="'.$row["stopID"].'" class="btn center-block btn-xs btn-danger btn_delete">x</button></td>
                    <td><button type="button" name="close_btn" data-id5="'.$row["stopID"].'" class="btn btn-md btn-link btn_close">Close</button></td>
					<td><button type="button" name="open_btn" data-id6="'.$row["stopID"].'" class="btn center-block btn-md btn-link  btn_open">Open</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="Longitude" contenteditable></td>
				<td id="Latitude" contenteditable></td> 
				<td id="Status" contenteditable></td> 
                <td><button type="button" name="btn_add" id="btn_add" 

class="btn btn-xs center-block btn-success">+</button></td>  
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