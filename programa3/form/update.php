<?php
$mensaje = $_GET["mensaje"];

require "../inc/connectionDB.inc";
require "../inc/operationDB.inc";
	
$user = new operationDB();

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizar datos</title>

<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.button.min.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.button.min.js"></script>

<script>
	$(document).ready(function(){
		$("#clSave").on("click", function(){
			$("#tablaGeneral").slideToggle("slow");
		});
		$("#coSave").on("click", function(){
			$("#tablaGeneral").slideToggle("slow");
		});
		$("#cuSave").on("click", function(){
			$("#tablaGeneral").slideToggle("slow");
		});
		$("#btnSalir").on("click", function(){
			$("#tablaGeneral").slideToggle("slow");
		});
	});
</script>

</head>

<body background="../img/background.jpg">

<div class="container">

	<div class="row">

	<div style="display: inline-block">
		<a style="color: white; font-size: 16px;" ><strong>ITSTA</strong></a>
	</div>
	
 	<div align="right" style="font-size: 12px; display: inline-block; width: 95%;">
  		<form action="../index.php">
  			<button id="btnSalir" type="submit">Salir</button>
		</form>
	</div>
	
	</div>
	
	<div id="tablaGeneral">
<form method="post" action="acciones.php">
 
  <table width="800" align="center" style="color: white;">
   
   <?php
		//Crear el query
		$query = 'select * from practicas.pr_cliente where cl_noCliente = '.$mensaje;
	
		//Lanza el query
		$user->queryDB($query);
	
		$fila = $user->getRowsDB()
	?>
   
    <tbody>
      <tr>
        <td align="center">
         
         <table>
          <tbody>
            <tr>
              <td colspan="2" align="center"><h2>Datos del cliente</h2></td>
            </tr>
            <tr>
              <td width="141"><label for="clArr[]">Nombre:</label></td>
              <?php
              echo "<td width=\"161\"><input type=\"text\" name=\"clArr[]\" id=\"clArr[]\" value=\"".$fila["cl_nombre"]."\" required=\"required\"></td>";
			  
            echo "</tr>";
            echo "<tr>";
              echo "<td><label for=\"clArr[]\">Apellido paterno:</label></td>";
              
				echo "<td><input type=\"text\" name=\"clArr[]\" id=\"clArr[]\" value=\"".$fila["cl_apellidoP"]."\" required=\"required\"></td>";
			  
            echo "</tr>";
            echo "<tr>";
              echo "<td><label for=\"textfield3\">Apellido materno:</label></td>";
              echo "<td><input value=\"".$fila["cl_apellidoM"]."\" type=\"text\" name=\"clArr[]\" id=\"clArr[]\" required=\"required\"></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td><label for=\"textfield4\">RFC:</label></td>";
              echo "<td><input value=\"".$fila["cl_rfc"]."\" type=\"text\" name=\"clArr[]\" id=\"clArr[]\" required=\"required\"></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td>&nbsp;</td>";
              echo "<td><button  type=\"submit\" name=\"clSave\" id=\"clSave\" value=\"".$mensaje."\">Guardar</button>";
            echo "</tr>";
			?>
          </tbody>
        </table>
        </td>
        
        <td align="center">
         <table width="300">
         
        <?php
			//Crear el query
			$query = 'select * from practicas.pr_cotitular where cl_noCliente = '.$mensaje;
	
			//Lanza el query
			$user->queryDB($query);
	
			$fila = $user->getRowsDB()
		?>
         
          <tbody>
            <tr>
              <td colspan="2" align="center"><h2>Datos del cotitular</h2></td>
            </tr>
            <?php
            echo "<tr>";
              echo "<td width=\"133\"><label for=\"coArr[]\">Nombre:</label></td>";
              echo "<td width=\"155\"><input value=\"".$fila["co_nombreCotitular"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\"></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td><label for=\"coArr[]\">Apellido paterno:</label></td>";
              echo "<td><input value=\"".$fila["co_apellidoP"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\"></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td><label for=\"coArr[]\">Apellido materno:</label></td>";
              echo "<td><input value=\"".$fila["co_apellidoM"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\"></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td><label for=\"coArr[]\">RFC:</label></td>";
              echo "<td><input value=\"".$fila["co_rfc"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\"></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td><label for=\"coArr[]\">Parentesco:</label></td>";
              echo "<td><input value=\"".$fila["co_parentesco"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\"></td>";
            echo "</tr>";
            echo "<tr>";
			
              echo "<td>&nbsp;</td>";
			  echo "<td><button  type=\"submit\" name=\"coSave\" id=\"coSave\" value=\"".$mensaje."\">Guardar</button>";
            echo "</tr>";
            ?>
          </tbody>
        </table></td>
      </tr>
      <tr>
        <td align="center">
         <table width="335">
         <?php
			//Crear el query
			$query = 'select * from practicas.pr_cuenta where cl_noCliente = '.$mensaje;
	
			//Lanza el query
			$user->queryDB($query);
	
			$fila = $user->getRowsDB()
		 ?>
          <tbody>
            <tr>
              <td colspan="2" align="center"><h2>Datos de la cuenta</h2></td>
            </tr>
            <?php
            echo "<tr>";
              echo "<td width=\"130\"><label for=\"cuArr[]\">Tipo de cuenta:</label></td>";
              echo "<td width=\"193\"><input value=\"".$fila["cu_tipoCuenta"]."\" type=\"text\" name=\"cuArr[]\" id=\"cuArr[]\" required=\"required\"></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td><label for=\"cuArr[]\">Fecha de apertura:</label></td>";
              echo "<td><input value=\"".$fila["cu_fechaApertura"]."\" type=\"text\" name=\"cuArr[]\" id=\"cuArr[]\"  required=\"required\" pattern=\"[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])\"  placeholder=\"YYYY-MM-DD\"></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td><label for=\"cuArr[]\">Saldo actual:</label></td>";
              echo "<td>$";
                echo "<input value=\"".$fila["cu_saldoActual"]."\" type=\"number\" name=\"cuArr[]\" id=\"cuArr[]\" required=\"required\"></td>";
            echo "</tr>";
            
            echo "<tr>";
              echo "<td></td>";
              echo "<td><button  type=\"submit\" name=\"cuSave\" id=\"cuSave\" value=\"".$mensaje."\">Guardar</button>";
              echo "</td>";
            echo "</tr>";
			 
			 $user->closedb();
            ?>
          </tbody>
        </table></td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  
</form>
</div>
</div>

<!-- Inicialización del boton -->
<script type="text/javascript">
$(function() {
	$( "#btnSalir" ).button(); 
	$("#cuSave").button();
	$("#clSave").button();
	$("#coSave").button();
});
</script>

</body>
</html>