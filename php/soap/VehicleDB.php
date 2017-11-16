<?php
class VehicleDB{
	
	public $LicensePlate = "";
	public $Model = "";
	public $status = "";
	public $longitude = "";
	public $latitude = "";
	
	function __construct($LicensePlate, $Model, $status, $longitude, $latitude){
		
		$this->LicensePlate = $LicensePlate;
		$this->Model = $Model;
		$this->status = $status;
		$this->longitude = $longitude;
		$this->latitude = $latitude;
	
	}
	
}

?>