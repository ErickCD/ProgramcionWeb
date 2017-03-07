<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Principal</title>

<?php 
	require "inc/connectionDB.inc";
	require "inc/operationDB.inc";
	
	$user = new operationDB('practicas', 'erick', 'localhost', 'root');
?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>

<body class="fondo">

<nav class="nav-title">ITSTA</nav>

<div class="container">

<h1>Control de zona bancario.</h1>

<?php
	$query = 'SELECT cl.cl_noCliente, cl.cl_nombre, cu.su_noSucursal, su.su_nombreSucursal, cu.cu_noCuenta, cu.cu_tipoCuenta,  cu.cu_saldoActual, co_nombreCotitular FROM practicas.pr_cliente cl join practicas.pr_cuenta cu on cl.cl_noCliente = cu.cl_noCliente join practicas.pr_sucursal su on cu.su_noSucursal = su.su_noSucursal join practicas.pr_cotitular co on cl.cl_noCliente = co.cl_noCliente order by cl.cl_nombre asc;';
	
	$user->queryDB($query);
?>

<form name="form1" id="form1" method="post" action="form/acciones.php">
	<table class="tableborder" border="1">
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
		
		
		echo "<td align=\"center\"><button  type=\"submit\" name=\"editar\" id=\"editar\" value=\"".$fila["cl_noCliente"]."\">Editar</button></td>";
		echo "<td align=\"center\"><button type=\"submit\" name=\"borrar\" id=\"borrar\" value=\"".$fila["cl_noCliente"]."\">Borrar</button></td>";
		
		
		echo "\t</tr>\n";
	}
    
?>
	</table>
</form>


<form action="form/crear.php">
  <button type="submit">Crear nuevo</button>
</form>


</div>
</body>

</html>