<?php

require_once('conn.php');

$query = "SELECT LicensePlate, Model, status, longitude, latitude FROM vehicle";

$response = @mysqli_query($conn, $query);

if($response){

echo '<table align="left" cellspacing="5" cellpadding="8">
 
<tr><td align="left"><b>LicensePlate</b></td>
<td align="left"><b>Model</b></td>
<td align="left"><b>status</b></td>
<td align="left"><b>longitude</b></td>
<td align="left"><b>latitude</b></td></tr>';


// mysqli_fetch_array will return a row of data from the query

// until no further data is available

while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .

$row['LicensePlate'] . '</td><td align="left">' .

$row['Model'] . '</td><td align="left">' .

$row['status'] . '</td><td align="left">' .

$row['longitude'] . '</td><td align="left">' .

$row['latitude'] . '</td><td align="left">' ;

echo '</tr>';

}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($conn);

}

mysqli_close($conn);

?>
