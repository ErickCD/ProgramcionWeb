<?php
class DTODashboard{
	
	public function __construct(){
		
	}
	
	public function getTablaPrincipal($connection){
		$user = $connection;
		$query = "SELECT cl.cl_noCliente, cl.cl_nombre, cu.su_noSucursal, su.su_nombreSucursal, cu.cu_noCuenta, cu.cu_tipoCuenta,  cu.cu_saldoActual, co_nombreCotitular FROM practicas.pr_cliente cl join practicas.pr_cuenta cu on cl.cl_noCliente = cu.cl_noCliente join practicas.pr_sucursal su on cu.su_noSucursal = su.su_noSucursal join practicas.pr_cotitular co on cl.cl_noCliente = co.cl_noCliente order by cl.cl_nombre asc;";
		//proceso
		$user->queryDB($query);
		//variables
		$arrTablaPrincipal;
		$cont = 0;
	
		//Pasa a Arreglo
		while ($fila = $user->getRowsDB()) {
			$arrTablaPrincipal[ $cont ][0] = $fila['cl_noCliente'];
			$arrTablaPrincipal[ $cont ][1] = $fila['cl_nombre'];
			$arrTablaPrincipal[ $cont ][2] = $fila['su_noSucursal'];
			$arrTablaPrincipal[ $cont ][3] = $fila['su_nombreSucursal'];
			$arrTablaPrincipal[ $cont ][4] = $fila['cu_noCuenta'];
			$arrTablaPrincipal[ $cont ][5] = $fila['cu_tipoCuenta'];
			$arrTablaPrincipal[ $cont ][6] = $fila['cu_saldoActual'];
			$arrTablaPrincipal[ $cont ][7] = $fila['co_nombreCotitular'];
			$cont ++;
		}
		$user->closedb();
	
		return($arrTablaPrincipal);
	}
}
?>