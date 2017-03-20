<?php
	require "../inc/connectionDB.inc";
	require "../inc/operationDB.inc";
	
	$user = new operationDB();
	
	

	//The first condition from Index
	if(isset($_POST['editar'])){
		$e = $_POST{'editar'};
		
		header("Location: ./update.php?mensaje=$e");
		die();		
		
	}
	//The second condition from index
	elseif(isset($_get['borrar'])){
		$del = $_POST{'borrar'};
		
		//Query to do
		$query = "delete from practicas.pr_cliente where practicas.pr_cliente.cl_noCliente = " . $del;
		
		//Do query to db
		$user->queryDB($query);
		$user->closedb();
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
		
		$user->closedb();
		
		//******Return to the index, where are all the datas*****
		header('Location: ../index.php');
		die();
		
		//Update cliente datos
	}elseif(isset($_POST['clSave'])){
		$numero = $_POST{'clSave'};
		$arrCl = $_POST['clArr'];
		
		/*
		//Prueba de funcionalidad
		echo "UPDATE `practicas`.`pr_cliente` SET `cl_nombre`='".$arrCl[0]."', `cl_apellidoP`='".$arrCl[1]."', `cl_apellidoM`='".$arrCl[2]."', `cl_rfc`='".$arrCl[3]."' WHERE `cl_noCliente`='".$numero."';";
		*/
		
		$updateCl = "UPDATE `practicas`.`pr_cliente` SET `cl_nombre`='".$arrCl[0]."', `cl_apellidoP`='".$arrCl[1]."', `cl_apellidoM`='".$arrCl[2]."', `cl_rfc`='".$arrCl[3]."' WHERE `cl_noCliente`='".$numero."';";
		
		$user->queryDB($updateCl);		
		
		$user->closedb();
		
		header("Location: ./update.php?mensaje=$numero");
		die();
		
		
		/* Pruebas de recorrido del arreglo
		foreach ($_POST['clArr'] as $key => $value){
			echo $value . "<br />";
		}
		echo "el numero de cliente es: " .$numero;
		*/
		
	}elseif(isset($_POST['coSave'])){
		$numero = $_POST{'coSave'};
		$coArr = $_POST['coArr'];
		
		// Una impresión de prueba
		/*
		echo "UPDATE `practicas`.`pr_cotitular` SET `co_nombreCotitular`='".$coArr[0]."', `co_apellidoP`='".$coArr[1]."', `co_apellidoM`='".$coArr[2]."', `co_rfc`='".$coArr[3]."', `co_parentesco`='".$coArr[4]."' WHERE `cl_noCliente`='".$numero."';";
		*/
		
		
		$updateCo = "UPDATE `practicas`.`pr_cotitular` SET `co_nombreCotitular`='".$coArr[0]."', `co_apellidoP`='".$coArr[1]."', `co_apellidoM`='".$coArr[2]."', `co_rfc`='".$coArr[3]."', `co_parentesco`='".$coArr[4]."' WHERE `cl_noCliente`='".$numero."';";
		
		$user->queryDB($updateCo);		
		
		$user->closedb();
		
		header("Location: ./update.php?mensaje=$numero");
		die();
		
		/*
		foreach ($_POST['coArr'] as $key => $value){
			echo $value . "<br />";
		}
		*/
		
	}elseif(isset($_POST['cuSave'])){
		$numero = $_POST{'cuSave'};
		$cuArr = $_POST['cuArr'];
		
		
		$updateCu = "UPDATE `practicas`.`pr_cuenta` SET `cu_tipoCuenta`='".$cuArr[0]."', `cu_fechaApertura`='".$cuArr[1]."', `cu_saldoActual`='".$cuArr[2]."' WHERE `cl_noCliente`='".$numero."';";
		
		$user->queryDB($updateCu);
		
		$user->closedb();
		
		header("Location: ./update.php?mensaje=$numero");
		die();
		
		/*
		foreach ($_POST['cuArr'] as $key => $value){
			echo $value . "<br />";
		}
		*/
		
	}else{
		header('Location: ../index.php');
		die();
	}
?>