
<?php

$user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 

// $connect = mysqli_connect("localhost", "root", "", "test_db");  
 $output = '';  
 //$sql = "SELECT * FROM tbl_sample 
$sql = "SELECT routeID, Description FROM routehead ORDER BY routeID DESC";  

 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th bgcolor = "#d6d6c2" width="10%">Route Id</th>  
                     <th bgcolor = "#d6d6c2" width="40%">Description</th>  
					 
                     <th bgcolor = "#d6d6c2" width="10%">Delete</th>  
					  <th bgcolor = "#d6d6c2" width="10%">Edit Stops</th> 
                </tr>';  
				
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
		   <td>'.$row["routeID"].'</td>  
                     <td class="Description" data-id1="'.$row["routeID"].'" contenteditable>'.$row["Description"].'</td>  					 
                     <td><button type="button" name="delete_btn" data-id2="'.$row["routeID"].'" class="btn center-block btn-xs btn-danger btn_delete">x</button></td> 
					 <td><button type="button" name="edit_btn" data-id3="'.$row["routeID"].'" class="btn center-block btn-xs btn-primary btn_edit">edit</button></td> 
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="Description" contenteditable></td>	
                <td><button type="button" name="btn_add" id="btn_add" 
				class="btn center-block btn-xs btn-success">+</button></td>  
           </tr>';  
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