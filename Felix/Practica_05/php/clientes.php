<?php
	require "./connectionDB.inc";
	require "./operationDB.inc";
	$user = new operationDB('practicas', 'erick', 'localhost', 'root');



 $query = 'SELECT cl.cl_noCliente, cl.cl_nombre, cu.su_noSucursal, su.su_nombreSucursal, cu.cu_noCuenta, cu.cu_tipoCuenta,  cu.cu_saldoActual, co_nombreCotitular FROM practicas.pr_cliente cl join practicas.pr_cuenta cu on cl.cl_noCliente = cu.cl_noCliente join practicas.pr_sucursal su on cu.su_noSucursal = su.su_noSucursal join practicas.pr_cotitular co on cl.cl_noCliente = co.cl_noCliente order by cl.cl_nombre asc;';
	
	$user->queryDB($query);
echo "se ha cargado";
?>

<div style="position:relative;background:rgb(12,34,54,25);min-width:50px;min-height:50px;">
<form name="operaciones" method="POST" action="./php/operaciones.php">
<table width="1000" border="1" id="tResults"  style="border:solid black;">
  <tr style="">
    <th>No. Cliente</th>
    <th>Nombre cliente</th>
    <th>No. Sucursal</th>
    <th>Nombre sucursal</th>
    <th>No. cuenta</th>
    <th>Tipo de cuenta</th>
    <th>Saldo actual</th>
    <th>Nombre coticular</th> 
    <th>Borrar</th> 
    <th>Editar</th> 
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
		
		
		echo "<td align=\"center\"><button  type=\"submit\" name=\"edit\" id=\"edit\" value=\"".$fila["cl_noCliente"]."\" >Editar</button></td>";
		echo "<td align=\"center\"><button type=\"submit\" name=\"delete\" id=\"delete\" value=\"".$fila["cl_noCliente"]."\">Borrar</button></td>";
				
		echo "\t</tr>\n";
	}
    
?>

</table>
</form>
</div>