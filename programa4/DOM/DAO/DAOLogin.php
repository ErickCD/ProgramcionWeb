<?php
class Login{
	private $nomUsuario = "nombreDefault";
	private $pass = "passDefault";
	
	function __contruct(){
		
	}
	
	public function __getPass(){
		return "{$this->pass}";
	}
	
	public function __getnomUsuario(){
		return $this->nomUsuario;
	}
	
	public function __setPass($pass){
		$this->pass = $pass;
	}
	
	public function __setnomUsuario($nomUsuario){
		$this->nomUsuario = $nomUsuario;
	}
}
?>