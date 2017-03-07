<?php
	require "../inc/connectionDB.inc";
	require "../inc/operationDB.inc";
	
	$user = new operationDB('practicas', 'erick', 'localhost', 'root');
	
	

	//The first condition from Index
	if(isset($_POST['editar'])){
		$e = $_POST{'editar'};
		
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Actualizar datos</title>
	</head>

<body>
<p>Aqui se va a actualizar la información y seguir</p>
<form action="../index.php">
	<button>Seguir</button>
</form>

</body>

</html>


<?php		
		
	}
	//The second condition from index
	elseif(isset($_POST['borrar'])){
		$del = $_POST{'borrar'};
		
		//Query to do
		$query = "delete from practicas.pr_cliente where practicas.pr_cliente.cl_noCliente = " . $del;
		
		//Do query to db
		$user->queryDB($query);
		header('Location: ../index.php');
		die();
	}
	//The third condition from crear
	elseif(isset($_POST['guardar'])){
		$save = $_POST['arr'];
		$arrd = $_POST['arrd'];
		$arrc = $_POST['arrc'];
		
		//The first insertion
		$cl = "INSERT INTO `practicas`.`pr_cliente` (`cl_noCliente`, `cl_nombre`, `cl_apellidoP`, `cl_apellidoM`, `cl_rfc`) VALUES ('".$save[0]."', '".$save[1]."', '".$save[2]."', '".$save[3]."', '".$save[4]."');";

		
		//Send the first insertion
		$user->queryDB($cl);
		
		//Prepara la segunda inserción
		$cu = "INSERT INTO `practicas`.`pr_cuenta` (`cu_noCuenta`, `cu_tipoCuenta`, `cu_fechaApertura`, `cu_saldoActual`, `cl_noCliente`, `su_noSucursal`) VALUES ('".$arrd[0]."', '".$arrd[1]."', '".$arrd[2]."', '".$arrd[3]."', '".$save[0]."', '".$arrd[4]."');";
		//Lanza la segunda inserción
		$user->queryDB($cu);
		
		
		//Do the third insertion
		$co = "INSERT INTO `practicas`.`pr_cotitular` (`co_noTitular`, `co_nombreCotitular`, `co_apellidoP`, `co_apellidoM`, `co_rfc`, `co_parentesco`, `cl_noCliente`) VALUES ('".$arrc[0]."', '".$arrc[0]."', '".$arrc[0]."', '".$arrc[0]."', '".$arrc[0]."', '".$arrc[0]."', '".$save[0]."');";
		//Launch the second search
		$user->queryDB($co);
		
		//******Return to the index, where are all the datas*****
		header('Location: ../index.php');
		die();
	}else{
		header('Location: ../index.php');
		die();
	}
?>