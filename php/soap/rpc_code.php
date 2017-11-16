<html>

<?php

require_once('Vehicle.php');

$Vehicle_data = new Vehicle();

if(isset($_POST['submit'])){

 switch($_POST['request']){

case "Get First Names" :

        $vehicle_info = $Vehicle_data->getVehicleLicense();

        break;

    case "Get Last Names" :

        $vehicle_info = $Vehicle_data->getVehicleLicense();

        break;

    default:

        http_response_code(400);
 }
    
    echo json_encode($vehicle_info);

}

?>

<form action="rpc_code.php" method="post">

Request:

<select name="request">

<option>Get First Names</option>

<option>Get Last Names</option>

</select>

<input type="submit" name="submit">

</form>

</html>