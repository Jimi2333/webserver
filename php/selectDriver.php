<?php

$user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 

// $connect = mysqli_connect("localhost", "root", "", "test_db");  
 $output = '';  
 //$sql = "SELECT * FROM tbl_sample 
$sql = "SELECT DriverID, FirstName, LastName, Username, Password FROM driver ORDER BY DriverID";  

 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th bgcolor = "#d6d6c2" width="10%">Id</th>  
					 <th bgcolor = "#d6d6c2" width="40%">First Name</th>  
                     <th bgcolor = "#d6d6c2" width="40%">Last Name</th>  
                     <th bgcolor = "#d6d6c2" width="40%">Username</th>  
                     <th bgcolor = "#d6d6c2" width="40%">Password</th>  
                     <th bgcolor = "#d6d6c2" width="10%">Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<td>'.$row["DriverID"].'</td>  
					 <td class="FirstName" data-id1="'.$row["DriverID"].'" contenteditable>'.$row["FirstName"].'</td>  
                     <td class="LastName" data-id2="'.$row["DriverID"].'" contenteditable>'.$row["LastName"].'</td>  
                     <td class="Username" data-id3="'.$row["DriverID"].'" contenteditable>'.$row["Username"].'</td>  
                     <td class="Password" data-id4="'.$row["DriverID"].'" contenteditable>'.$row["Password"].'</td>  
                     <td><button type="button" name="delete_btn" data-id5="'.$row["DriverID"].'" class="btn center-block btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
				<td id="FirstName" contenteditable></td>  
                <td id="LastName" contenteditable></td>  
                <td id="Username" contenteditable></td>  
                <td id="Password" contenteditable></td>  
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