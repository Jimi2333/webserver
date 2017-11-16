<?php

require_once('Vehicle.php');

$options = array("uri" => "https://unishuttle.co.nz/soap");

$server = new SoapServer(null, $options);

$server->setClass('Vehicle');

$server->handle();

?>