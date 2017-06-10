<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Principal</title>

<?php 
	require "inc/connectionDB.inc";
	require "inc/operationDB.inc";
	
	$user = new operationDB();
?>

<link href="./form/jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="./form/jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="./form/jQueryAssets/jquery.ui.button.min.css" rel="stylesheet" type="text/css">
<link href="./css/style.css" rel="stylesheet" type="text/css">

<link href="./js/jquery-ui.js" rel="stylesheet" type="text/javascript">
<link href="./js/jquery-ui.min.js" rel="stylesheet" type="text/javascript">

<script src="./form/jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="./form/jQueryAssets/jquery.ui-1.10.4.button.min.js"></script>



<script>
	$(document).ready(function(){
		$("#btnEf").on("click", function(){
			$("#effect").slideToggle("slow");
		});
		$("#editar").on("click", function(){
			$("#effect").slideToggle("slow");
		});
		$("#btnCrear").on("click", function(){
			$("#effect").slideToggle("slow");
		});
	});
</script>

</head>

<body id="body" background="img/background.jpg">

<div class="container">

<div class="row">

<div style="display: inline-block">
	<a style="color: white; font-size: 16px;" ><strong>ITSTA</strong></a>
</div>

<div align="right" style="display: inline-block; font-size: 12px; width: 95%;">
	<form action="form/crear.php">
		<button name="btnCrear" id="btnCrear" type="submit" >Crear nuevo usuario</button>
	</form>
</div>

</div>

<p align="center" style="color: #FFFFFF; font-size: 30px;"><strong>Control de zona bancario.</strong></p>

<?php
	$query = 'SELECT cl.cl_noCliente, cl.cl_nombre, cu.su_noSucursal, su.su_nombreSucursal, cu.cu_noCuenta, cu.cu_tipoCuenta,  cu.cu_saldoActual, co_nombreCotitular FROM practicas.pr_cliente cl join practicas.pr_cuenta cu on cl.cl_noCliente = cu.cl_noCliente join practicas.pr_sucursal su on cu.su_noSucursal = su.su_noSucursal join practicas.pr_cotitular co on cl.cl_noCliente = co.cl_noCliente order by cl.cl_nombre asc;';
	
	$user->queryDB($query);
?>
<div id="effect" style="color: white">
 <form name="form1" id="form1" method="post" action="form/acciones.php"> 
	<!-- <form name="form1" id="form1"> -->
	<table align="center">
  		<tbody>
    		<tr>
      		<td width="96" >Número_cliente</td>
      		<td width="97" >Nombre_cliente</td>
      		<td width="106" >Número_sucursal</td>
      		<td width="107" >Nombre_sucursal</td>
      		<td width="97" >Número_cuenta</td>
      		<td width="75" >Tipo_cuenta</td>
      		<td width="78" >Saldo_actual</td>
      		<td width="107" >Nombre_cotitular</td>
      		<td width="60" >Actualizar</td>
      		<td width="74" >Borrar</td>
    		</tr>

<?php
	while ($fila = $user->getRowsDB()) {
		echo "<tr>\n";
		
		echo "<td>".$fila["cl_noCliente"]."</td>\t";
		echo "<td>".$fila["cl_nombre"]."</td>\t";
		echo "<td>".$fila["su_noSucursal"]."</td>";
		echo "<td>".$fila["su_nombreSucursal"]."</td>";
		echo "<td>".$fila["cu_noCuenta"]."</td>";
		echo "<td>".$fila["cu_tipoCuenta"]."</td>";
		echo "<td>".$fila["cu_saldoActual"]."</td>";
		echo "<td>".$fila["co_nombreCotitular"]."</td>";
		
		
		echo "<td align=\"center\"><button  type=\"submit\" name=\"editar\" id=\"editar\" value=\"".$fila["cl_noCliente"]."\"><img src=\"img/actualizar.jpg\"/></button></td>";
		echo "<td align=\"center\"><button type=\"submit\" name=\"borrar\" id=\"borrar\" value=\"".$fila["cl_noCliente"]."\"><img src=\"img/eliminar.jpg\"/></button></td>";
		
		
		echo "\t</tr>\n";
	}
    $user->closedb();
?>
	<!-- <button onClick="javascript:borrar();"></button> -->
	</table>
</form>
</div>

<button onClick="style">boton de prueba</button>

<br><br>
<button id="btnEf" name="btnEf">Ocultar Tabla</button>
</div>

<script type="text/javascript">
	$(function(){
		$("#btnCrear").button();
		$("#btnEf").button();
	});
	
	$('input[type="submit"]').click(function(){
         $(this).addClass('red');
	});
</script>

</body>

</html>