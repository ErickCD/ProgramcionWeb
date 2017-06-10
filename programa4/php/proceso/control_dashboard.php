<?php
require('../../DOM/Bussines.php');

class controlDashboard{
	
	private $claseBussines;
	
	public function __construct(){
		$this->claseBussines = new Buss();
	}
	
	public function obtenerTabla(){
		return $this->claseBussines->bussTablaPrincipal();
	}
}
?>