<?php
$mensaje = $_GET["mensaje"];

require "../../DOM/connectionDB.inc";
require "../../DOM/operationDB.inc";
	
$user = new operationDB();

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizar datos</title>

<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
<!--Let browser know website is optimized for mobile-->
</head>

<body>

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
	
<form method="post" action="acciones.php">
   
   <?php
		//Crear el query
		$query = 'select * from practicas.pr_cliente where cl_noCliente = '.$mensaje;
	
		//Lanza el query
		$user->queryDB($query);
	
		$fila = $user->getRowsDB();
	?>
   <div class="row">
        <div class="container col m6 s12">
              <h2>Datos del cliente</h2>
            <?php
            echo "<div class=\"row input-field\">
              <label class=\"active\" for=\"clArr[]\">Nombre:</label>
              <input type=\"text\" name=\"clArr[]\" id=\"clArr[]\" value=\"".$fila["cl_nombre"]."\" required=\"required\">
            </div>
	  
            <div class=\"row input-field\">
			  <label class==\"active\" for=\"clArr[]\">Apellido paterno:</label>
              <input type=\"text\" name=\"clArr[]\" id=\"clArr[]\" value=\"".$fila["cl_apellidoP"]."\" required=\"required\"></div>
	  
            <div class\"row input-field\">
			  <label class=\"active\" for=\"clArr[]\">Apellido materno:</label>
              <input value=\"".$fila["cl_apellidoM"]."\" type=\"text\" name=\"clArr[]\" id=\"clArr[]\" required=\"required\"
			</div>
	  
            <div class=\"row input-field\">
			<label class=\"active\" for=\"clArr[]\">RFC:</label>
            <input value=\"".$fila["cl_rfc"]."\" type=\"text\" name=\"clArr[]\" id=\"clArr[]\" required=\"required\">
			</div>
	  
            <tr><td><div class=\"row\">
			<button class=\"btn\" type=\"submit\" name=\"clSave\" id=\"clSave\" value=\"".$mensaje."\">Guardar</button>
            </div>";
			
	   echo "</div>";
       
       
       echo "<div class=\"container col m6 s12\">";
        
			//Crear el query
			$query = 'select * from practicas.pr_cotitular where cl_noCliente = '.$mensaje;
	
			//Lanza el query
			$user->queryDB($query);
	
			$fila = $user->getRowsDB();
		
          echo "<h2>Datos del cotitular</h2>";
            
            echo "<div class\"row input-field\">
			  <label class\"active\" for=\"coArr[]\">Nombre:</label>
			  <input value=\"".$fila["co_nombreCotitular"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\">
			  </div>
			 
            <div class=\"row input-field\">
			<label class\"active\" for=\"coArr[]\">Apellido paterno:</label>
            <input value=\"".$fila["co_apellidoP"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\">
			</div>
			 
            <div class=\"row input-field\">
			<label class\"active\" for=\"coArr[]\">Apellido materno:</label>
            <input value=\"".$fila["co_apellidoM"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\">
			</div>
			 
            <div class=\"row input-field\">
			<label class\"active\" for=\"coArr[]\">RFC:</label>
            <input value=\"".$fila["co_rfc"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\">
			</div>
			 
            <div class=\"row input-field\">
			<label class\"active\" for=\"coArr[]\">Parentesco:</label>
            <input value=\"".$fila["co_parentesco"]."\" type=\"text\" name=\"coArr[]\" id=\"coArr[]\" required=\"required\
			</div>
			 
            <div class=\"row\">
			<button class=\"btn\" type=\"submit\" name=\"coSave\" id=\"coSave\" value=\"".$mensaje."\">Guardar</button>
			</div>";
            ?>
	   </div>
     </div>
     
     
      <div class="row">
        <div class="container">
         <table>
         <?php
			//Crear el query
			$query = 'select * from practicas.pr_cuenta where cl_noCliente = '.$mensaje;
	
			//Lanza el query
			$user->queryDB($query);
	
			$fila = $user->getRowsDB()
		 ?>
          <tbody>
            <tr>
              <td><h2>Datos de la cuenta</h2></td>
            </tr>
            <?php
            echo "<tr><td><div class=\"row\">
			<label for=\"cuArr[]\">Tipo de cuenta:</label>
            <input value=\"".$fila["cu_tipoCuenta"]."\" type=\"text\" name=\"cuArr[]\" id=\"cuArr[]\" required=\"required\">
			</div></td></tr>";
			 
            echo "<tr><td><div class=\"row\">
			<label for=\"cuArr[]\">Fecha de apertura:</label>
            <input value=\"".$fila["cu_fechaApertura"]."\" type=\"text\" name=\"cuArr[]\" id=\"cuArr[]\"  required=\"required\" pattern=\"[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])\"  placeholder=\"YYYY-MM-DD\">
			</div></td></tr>";
			 
            echo "<tr><td><div class=\"row\">
			<label for=\"cuArr[]\">Saldo actual:</label>
            <input value=\"".$fila["cu_saldoActual"]."\" type=\"number\" name=\"cuArr[]\" id=\"cuArr[]\" required=\"required\"></div></td></tr>";
            
            echo "<tr><td><div class=\"row\">
			<button  type=\"submit\" name=\"cuSave\" id=\"cuSave\" value=\"".$mensaje."\">Guardar</button>
            </div></td></tr>";
			 
			 $user->closedb();
            ?>
          </tbody>
        </table></div>
  
</form>
</div>
</div>

<!-- Inicialización del boton -->
	<script type="text/javascript" src="../../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../../js/materialize.min.js"></script>

</body>
</html>