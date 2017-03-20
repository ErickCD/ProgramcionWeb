<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insertar datos</title>

<?php 
	require "../inc/connectionDB.inc";
	require "../inc/operationDB.inc";
	
	$user = new operationDB();
?>

<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.button.min.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.button.min.js"></script>

<script>
	$(document).ready(function(){
		$("#guardar").on("click", function(){
			$("#tabla").slideToggle("slow");
		});
		$("#btnsalir").on("click", function(){
			$("#tabla").slideToggle("slow");
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
  			<button id="btnsalir" type="submit">Salir</button>
		</form>
	</div>
	
	</div>
  
  <div id="tabla" style="color: white; font-size: 16px;">
	  <form name="form_save" id="form_save" method="post" action="acciones.php" >
	    
	    <table width="980" border="0" align="center">
    <tbody>
      <tr>
        <td height="50" colspan="6" align="center" style="font-size: 24px;">Módulo de Inserción de Datos</td>
      </tr>
      <tr>
        <td colspan="2" align="center">Cliente</td>
        <td colspan="2" align="center">Cuenta</td>
        <td colspan="2" align="center">Cotitular</td>
      </tr>
      <tr>
        <td width="126"><label for="arr[]">Número de cliente:</label></td>
        <td width="167"><input name="arr[]" type="number" required id="arr[]" placeholder="102921"></td>
        <td width="140">Número de cuenta:</td>
        <td width="180"><input name="arrd[]" type="number" required="required" id="arrd[]"></td>
        <td width="149">Número cotitular:</td>
        <td width="173"><input type="number" name="arrc[]" id="arrc[]"></td>
      </tr>
      <tr>
        <td><label for="arr[]">Nombre cliente: </label></td>
        <td><input name="arr[]" type="text" required="required" id="arr[]"></td>
        <td><label for="arrd[]">Tipo de cuenta:</label></td>
        <td><input name="arrd[]" type="text" required="required" id="arrd[]"></td>
        <td><label for="arrc[]">Nombre cotitular:</label></td>
        <td><input type="text" name="arrc[]" id="arrc[]"></td>
      </tr>
      <tr>
        <td><label for="arr[]">Apellido paterno:</label></td>
        <td><input name="arr[]" type="text" required="required" id="arr[]"></td>
        <td><label for="arrd[]">Fecha de apertura:</label></td>
        <td><input name="arrd[]" type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required="required" id="arrd[]" placeholder="YYYY-MM-DD"></td>
        <td><label for="arrc[]">Apellido paterno:</label></td>
        <td><input type="text" name="arrc[]" id="arrc[]"></td>
      </tr>
      <tr>
        <td><label for="arr[]">Apellido materno:</label></td>
        <td><input name="arr[]" type="text" required="required" id="arr[]"></td>
        <td><label for="arrd[]">Saldo inicial:</label></td>
        <td><input name="arrd[]" type="number" required="required" id="arrd[]"></td>
        <td><label for="arrc[]">Apellido materno:</label></td>
        <td><input type="text" name="arrc[]" id="arrc[]"></td>
      </tr>
      <tr>
        <td><label for="arr[]">RFC:</label></td>
        <td><input name="arr[]" type="text" required="required" id="arr[]" placeholder="AEAE941221"></td>
        <?php	
		  $query = 'SELECT su_noSucursal, su_nombreSucursal FROM u891629398_pract.pr_sucursal;';
			
		  $user->queryDB($query);
		?>
        <td>Sucursales:</td>
        <td><select name="arrd[]2" required id="arrd[]2">
          <?php
			while ($fila = $user->getRowsDB()) {
				echo "<option value=\"".$fila["su_noSucursal"]."\">".$fila["su_nombreSucursal"]."</option>\n";
			}
		 ?>
        </select></td>
        <td><label for="arrc[]">RFC cotitular:</label></td>
        <td><input name="arrc[]" type="text" required="required" id="arrc[]"></td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td>&nbsp;</td>
        
        <td>&nbsp;</td>
        
        <td><label for="arrc[]">Parentesco cotitular:</label></td>
        <td><input name="arrc[]" type="text" id="arrc[]" placeholder="Ejem: Hermano"></td>
      </tr>
      <tr>
        <td colspan="6">&nbsp;</td>
      </tr>
      <tr>
        
        <td colspan="2"></td>
        <td colspan="2"><input type="submit" name="guardar" id="guardar" value="guardar"></td>
        <td colspan="2"></td>
      </tr>
    </tbody>
  </table>
	  	
	  	
	  	
</form>
</div>

<script type="text/javascript">
	$(function() {
		$( "#guardar" ).button(); 
		$( "#btnsalir" ).button(); 
	});
</script>

</div>
</body>
</html>