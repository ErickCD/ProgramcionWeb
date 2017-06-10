<?php
//Imposta la conneccion a la base de datos
require('connectionDB.inc');
require('operationDB.inc');

//Data Tranfer Object
require('DTOLogin.php');
require('DTODashboard.php');

class Buss{
	
	private $Login;
	private $dashboard;
	//Class var object connection to database
	private $user;
	
	public function __construct(){
		$this->Login = new DTOLogin();
		$this->dashboard = new DTODashboard();
		
		//Create connection object to data base
		$this->user = new operationDB();
	}
	
	public function bussValidaUsuario($DAOLogin){
		$temp = $DAOLogin;
		return $this->Login->validaUsuario($temp, $this->user);
	}
	
	public function bussTablaPrincipal(){
		return $this->dashboard->getTablaPrincipal($this->user);
	}
	
	public function borraUsuario(){
		
	}
}
?>