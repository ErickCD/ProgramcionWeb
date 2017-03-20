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
	<!--
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.structure.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.theme.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.button.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.button.min.js"></script>
-->

<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script type="text/javascript">
$(function() {
	
	
	function runEffects(){
		var options = {};
		$("#mover").effect("drop", options, 500, callback();
	}
	
	function callback() {
      setTimeout(function() {
        $( "#mover" ).removeAttr( "style" ).hide().fadeIn();
      }, 1000 );
    };
	
	$("#mover").on("click", function(){
		runEffects();
		return false;
	});
});
</script>
</head>

<body>

<nav class="nav-title">ITSTA</nav>

<div class="container">

<h1>Control de zona bancario.</h1>

<?php
	$query = 'SELECT cl.cl_noCliente, cl.cl_nombre, cu.su_noSucursal, su.su_nombreSucursal, cu.cu_noCuenta, cu.cu_tipoCuenta, cu.cu_saldoActual, co_nombreCotitular
FROM u891629398_pract.pr_cliente cl
JOIN u891629398_pract.pr_cuenta cu ON cl.cl_noCliente = cu.cl_noCliente
JOIN u891629398_pract.pr_sucursal su ON cu.su_noSucursal = su.su_noSucursal
JOIN u891629398_pract.pr_cotitular co ON cl.cl_noCliente = co.cl_noCliente
ORDER BY cl.cl_nombre ASC';
	
	$user->queryDB($query);
?>

<form name="form1" id="form1" method="post" action="form/acciones.php">
	<table id="datos" border="1" align="center">
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
    
?>

	</table>
</form>

<br><br>

<div id="mover">
	<form action="form/crear.php">
  		<button class="" name="btnCrear" id="btnCrear" type="submit" >Crear nuevo</button>
	</form>
</div>

<br><br>

</div>

</body>

</html>