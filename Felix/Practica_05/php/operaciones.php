<?php
	require "./connectionDB.inc";
	require "./operationDB.inc";
	
	$user = new operationDB('practicas', '', 'localhost', 'root');
	
	

	if(isset($_POST['edit'])){
		$edit = $_POST{'edit'};		
		header("Location: ./editar.php?id_client=$edit");
		die();		
		
	}elseif(isset($_POST['delete'])){
		$delete = $_POST{'delete'};
		$query = "delete from practicas.pr_cliente where practicas.pr_cliente.cl_noCliente = " . $delete;
		$user->queryDB($query);
		
		header('Location: ../index.php');
		die();
	}elseif(isset($_POST['save'])){
		$client = $_POST["client"];
    		$account = $_POST["account"];
    		$coticular = $_POST["coticular"];

		$cl = "INSERT INTO `practicas`.`pr_cliente` VALUES ('".$client[0]."', '".$client[1]."', '".$client[2]."', '".$client[3]."', '".$client[4]."');";
		$user->queryDB($cl);
		
		$cu = "INSERT INTO `practicas`.`pr_cuenta`  VALUES ('".$account[0]."', '".$account[1]."', '".$account[2]."', '".$account[3]."', '".$client[0]."', '".$account[4]."');";
		$user->queryDB($cu);
		
		$co = "INSERT INTO `practicas`.`pr_cotitular` VALUES ('".$coticular[0]."', '".$coticular[1]."', '".$coticular[2]."', '".$coticular[3]."', '".$coticular[4]."', '".$coticular[5]."', '".$client[0]."');";
		$user->queryDB($co);

		header('Location: ../index.php');
		die();
		
	}elseif(isset($_POST['id_client'])){
		$id_client = $_POST{'id_client'};
		$client = $_POST["client"];
    		$account = $_POST["account"];
    		$coticular = $_POST["coticular"];

		$updateCl = "UPDATE `practicas`.`pr_cliente` SET `cl_nombre`='".$client[1]."', `cl_apellidoP`='".$client[2]."', `cl_apellidoM`='".$client[3]."', `cl_rfc`='".$client[4]."' WHERE `cl_noCliente`='".$id_client."';";
		$user->queryDB($updateCl);		

		$updateCo = "UPDATE `practicas`.`pr_cotitular` SET `co_nombreCotitular`='".$coticular[1]."', `co_apellidoP`='".$coticular[2]."', `co_apellidoM`='".$coticular[3]."', `co_rfc`='".$coticular[4]."', `co_parentesco`='".$coticular[5]."' WHERE `cl_noCliente`='".$id_client."';";
		$user->queryDB($updateCo);		
		
		$updateCu = "UPDATE `practicas`.`pr_cuenta` SET `cu_tipoCuenta`='".$account[1]."', `cu_fechaApertura`='".$account[2]."', `cu_saldoActual`='".$account[3]."'   WHERE `cl_noCliente`='".$id_client."';";
		$user->queryDB($updateCu);		
		// `su_noSucursal`='".$account[5]."'
		header("Location: ./editar.php?id_client=$id_client");
		die();

	}else{
		header('Location: ../index.php');
		die();
	}
?>