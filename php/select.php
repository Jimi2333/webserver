<?php

$user = 'root';
		$pass = 'shuttle*2017';
		$dbname = 'shuttlebus';

		//Create connection
		$conn= new mysqli('127.0.0.1', $user, $pass, $dbname); 

// $connect = mysqli_connect("localhost", "root", "", "test_db");  
 $output = '';  
 //$sql = "SELECT * FROM tbl_sample 
$sql = "SELECT AdminID, Username, Password FROM administrator ORDER BY adminid DESC";  

 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th bgcolor = "#d6d6c2" width="10%">Id</th>  
                     <th bgcolor = "#d6d6c2" width="40%">Username</th>  
                     <th bgcolor = "#d6d6c2" width="40%">Password</th>  
                     <th bgcolor = "#d6d6c2" width="10%">Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
		   <td>'.$row["AdminID"].'</td>  
                     <td class="Username" data-id1="'.$row["AdminID"].'" contenteditable>'.$row["Username"].'</td>  
                     <td class="Password" data-id2="'.$row["AdminID"].'" contenteditable>'.$row["Password"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["AdminID"].'" class="btn center-block btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
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