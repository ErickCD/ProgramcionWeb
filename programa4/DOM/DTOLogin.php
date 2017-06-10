<?php
class DTOLogin{
	public function __construct(){
		
	}
	
	public function validaUsuario($DAOLogin, $connection){
		$nomUser = $DAOLogin->__getnomUsuario();
		$pas = $DAOLogin->__getPass();
		
		$user = $connection;
		
		$query = "SELECT * FROM practicas.pr_cliente where cl_nombre = \"".$nomUser."\" and cl_noCliente = \"".$pas."\";";

		$user->queryDB($query);

		
		while ($fila = $user->getRowsDB()) {
			$int = strcmp($fila['cl_nombre'], $nomUser);
			if($int === 0){
				$user->closedb();
				unset($user);
				return (0);
				break;
			}
		}
		$user->closedb();
		unset($user);
		
		return(1);
	}
}
?>