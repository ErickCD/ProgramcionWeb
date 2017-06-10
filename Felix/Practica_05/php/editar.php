<!DOCTYPE html>
<head>
<title>Practica 04 -> Formularios. </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/page.css" type="text/css" media="all" />
<script languaje="javaScript" type="text/javascript" src="./js/ajax.js"></script>
<script languaje="javaScript" type="text/javascript" src="./js/operations.js"></script>

</head>
<body>


<div class="main">

  <div class="cabecera">
   <h4>Banco Banamex</h4> 
  </div> 

  <div class="opciones">
  </div>

<div id="contenido" class="contenido"> 
   
<?php 
	require "./connectionDB.inc";
	require "./operationDB.inc";
	
	$user = new operationDB('practicas', '', 'localhost', 'root');

     if(isset($_GET['id_client'])){
        $id_client = $_GET['id_client'];
?>


<form name="dataClient" method="post" action="./operaciones.php">
<table id="Client" border="2">
<caption> Datos del cliente </caption>
<?php

  $query = 'select * from practicas.pr_cliente where cl_noCliente = '.$id_client;
  $user->queryDB($query);
  $fila = $user->getRowsDB();

echo "<tr>";
echo "<td> Numero de cliente </td>";
echo "<td> <input type=\"number\" name=\"client[]\" value=\"".$fila['cl_noCliente']."\"/> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Nombre </td>";
echo "<td> <input type=\"text\" name=\"client[]\" value=\"".$fila['cl_nombre']."\"/> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Apellido paterno </td>";
echo "<td> <input type=\"text\" name=\"client[]\" value=\"".$fila['cl_apellidoP']."\"/> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Apellido materno </td>";
echo "<td> <input type=\"text\" name=\"client[]\" value=\"".$fila['cl_apellidoM']."\" /> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> RFC </td>";
echo "<td> <input type=\"text\" name=\"client[]\" value=\"".$fila['cl_rfc']."\"/> </td>";
echo "</tr>";

?>
</table> 

<table id="Account" border="2">
<caption> Datos de cuenta </caption>
<?php

  $query = 'select * from practicas.pr_cuenta where cl_noCliente = '.$id_client;
  $user->queryDB($query);
  $fila = $user->getRowsDB();

echo "<tr>";
echo "<td> Numero de cuenta </td>";
echo "<td> <input type=\"number\" name=\"account[]\" value=\"".$fila['cu_noCuenta']."\"/> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Tipo de cuenta </td>";
echo "<td> <input type=\"text\" name=\"account[]\" value=\"".$fila['cu_tipoCuenta']."\"/> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Fecha de apertura </td>";
echo "<td> <input type=\"text\" name=\"account[]\" value=\"".$fila['cu_fechaApertura']."\" /> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Saldo inicial </td>";
echo "<td> <input type=\"number\" name=\"account[]\" value=\"".$fila['cu_saldoActual']."\"/> </td>";
echo "</tr>";
echo "<tr>";
echo "<td>Sucursales:</td>";
echo "<td><select name=\"account[]\" required id=\"account[]\" >";

 $query = 'SELECT su_noSucursal, su_nombreSucursal FROM practicas.pr_sucursal;';
 $user->queryDB($query);
  while ($fila = $user->getRowsDB()) {
    echo "<option value=\"".$fila["su_noSucursal"]."\">".$fila["su_nombreSucursal"]."</option>\n";
  }
echo "</select>";
echo "</td>";
echo "</tr>";

?>
</table>

<table id="Coticular" border="2">
<caption> Datos del cotitular </caption>
<?php

  $query = 'select * from practicas.pr_cotitular where cl_noCliente = '.$id_client;
  $user->queryDB($query);
  $fila = $user->getRowsDB();

echo "<tr>";
echo "<td> Numero de coticular </td>";
echo "<td> <input type=\"number\" name=\"coticular[]\" value=\"".$fila['co_noTitular']."\" /> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Nombre coticular </td>";
echo "<td> <input type=\"text\" name=\"coticular[]\" value=\"".$fila['co_nombreCotitular']."\" /> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Apellido paterno </td>";
echo "<td> <input type=\"text\" name=\"coticular[]\" value=\"".$fila['co_apellidoP']."\" /> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Apellido materno </td>";
echo "<td> <input type=\"text\" name=\"coticular[]\" value=\"".$fila['co_apellidoM']."\"/> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> RFC </td>";
echo "<td> <input type=\"text\" name=\"coticular[]\" value=\"".$fila['co_rfc']."\"/> </td>";
echo "</tr>";
echo "<tr>";
echo "<td> Parentesco </td>";
echo "<td> <input type=\"text\" name=\"coticular[]\"  value=\"".$fila['co_parentesco']."\"/> </td>";
echo "</tr>";

?>
</table>

<?php
echo "<input type=\"hidden\" name=\"id_client\" value=\"" .$id_client. "\" />";
echo "<button  type=\"submit\" name=\"id_client\" id=\"id_client\" value=\"".$fila["cl_noCliente"]."\">Guardar cambios</button>";
?>
</form>
<form action="../index.php">
  		<button type="submit">Pagina principal</button>
</form>
<?php
  }else{
    	header('Location: ../index.php');
	die();
  }
?>


</div>
</div>

</body>
</html>
