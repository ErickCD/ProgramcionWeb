<?php 
	require "./connectionDB.inc";
	require "./operationDB.inc";
	
	$user = new operationDB('practicas', '', 'localhost', 'root');
?>

<form name="dataClient" method="post" action="./php/operaciones.php">
<table id="Client" border="2">
<caption> Datos del cliente </caption>
<tr>
<td> Numero de cliente </td>
<td> <input type="number" name="client[]" /> </td>
</tr>
<tr>
<td> Nombre </td>
<td> <input type="text" name="client[]" /> </td>
</tr>
<tr>
<td> Apellido paterno </td>
<td> <input type="text" name="client[]" /> </td>
</tr>
<tr>
<td> Apellido materno </td>
<td> <input type="text" name="client[]" /> </td>
</tr>
<tr>
<td> RFC </td>
<td> <input type="text" name="client[]" /> </td>
</tr>
</table> 

<table id="Account" border="2">
<caption> Datos de cuenta </caption>
<tr>
<td> Numero de cuenta </td>
<td> <input type="number" name="account[]" /> </td>
</tr>
<tr>
<td> Tipo de cuenta </td>
<td> <input type="text" name="account[]" /> </td>
</tr>
<tr>
<td> Fecha de apertura </td>
<td> <input type="text" name="account[]" /> </td>
</tr>
<tr>
<td> Saldo inicial </td>
<td> <input type="number" name="account[]" /> </td>
</tr>
<tr>
<td>Sucursales:</td>
<td><select name="account[]" required id="account[]">
<?php
 $query = 'SELECT su_noSucursal, su_nombreSucursal FROM practicas.pr_sucursal;';
 $user->queryDB($query);
  while ($fila = $user->getRowsDB()) {
    echo "<option value=\"".$fila["su_noSucursal"]."\">".$fila["su_nombreSucursal"]."</option>\n";
  }
?>
</select>
</td>
</tr>
</table>

<table id="Coticular" border="2">
<caption> Datos del coticular </caption>
<tr>
<td> Numero de coticular </td>
<td> <input type="number" name="coticular[]" /> </td>
</tr>
<tr>
<td> Nombre coticular </td>
<td> <input type="text" name="coticular[]" /> </td>
</tr>
<tr>
<td> Apellido paterno </td>
<td> <input type="text" name="coticular[]" /> </td>
</tr>
<tr>
<td> Apellido materno </td>
<td> <input type="text" name="coticular[]" /> </td>
</tr>
<tr>
<td> RFC </td>
<td> <input type="text" name="coticular[]" /> </td>
</tr>
<tr>
<td> Parentesco </td>
<td> <input type="text" name="coticular[]" /> </td>
</tr>
</table>

<input type="submit" value="save" name="save">Registrar</input>
</form>