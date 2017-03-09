<?php
$mensaje = $_GET["mensaje"];
echo $mensaje;

require "../inc/connectionDB.inc";
require "../inc/operationDB.inc";
	
$user = new operationDB('practicas', 'erick', 'localhost', 'root');

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<form action="../index.php">
  		<button type="submit">Salir</button>
</form>
<form method="post" action="acciones.php">
 
 	<?php
		//Crear el query
		$query = 'select * from practicas.pr_cliente where cl_noCliente = '.$mensaje;
	
		//Lanza el query
		$user->queryDB($query);
	
		$fila = $user->getRowsDB()
	?>
 
  <table width="800" align="center">
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
              echo "<td width=\"161\"><input type=\"text\" name=\"clArr[]\" id=\"clArr[]\" value=\"".$fila["cl_nombre"]."\"></td>";
			  ?>
            </tr>
            <tr>
              <td><label for="clArr[]">Apellido paterno:</label></td>
              <?php
				echo "<td><input type=\"text\" name=\"clArr[]\" id=\"clArr[]\" value=\"".$fila["cl_apellidoP"]."\"></td>";?>
            </tr>
            <tr>
              <td><label for="textfield3">Apellido materno:</label></td>
              <td><input type="text" name="textfield3" id="textfield3"></td>
            </tr>
            <tr>
              <td><label for="textfield4">RFC:</label></td>
              <td><input type="text" name="textfield4" id="textfield4"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="clSave" id="clSave" value="Guardar"></td>
            </tr>
          </tbody>
        </table>
        </td>
        
        <td align="center">
         
         <table width="300">
          <tbody>
            <tr>
              <td colspan="2" align="center"><h2>Datos del cotitular</h2></td>
            </tr>
            <tr>
              <td width="133"><label for="textfield15">Nombre:</label></td>
              <td width="155"><input type="text" name="textfield5" id="textfield15"></td>
            </tr>
            <tr>
              <td><label for="textfield16">Apellido paterno:</label></td>
              <td><input type="text" name="textfield6" id="textfield16"></td>
            </tr>
            <tr>
              <td><label for="textfield17">Apellido materno:</label></td>
              <td><input type="text" name="textfield7" id="textfield17"></td>
            </tr>
            <tr>
              <td><label for="textfield18">RFC:</label></td>
              <td><input type="text" name="textfield8" id="textfield18"></td>
            </tr>
            <tr>
              <td><label for="textfield19">Parentesco:</label></td>
              <td><input type="text" name="textfield9" id="textfield19"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="coSave" id="coSave" value="Guardar"></td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      <tr>
        <td align="center"><table width="335">
          <tbody>
            <tr>
              <td colspan="2" align="center"><h2>Datos de la cuenta</h2></td>
            </tr>
            <tr>
              <td width="130"><label for="textfield20">Tipo de cuenta:</label></td>
              <td width="193"><input type="text" name="textfield10" id="textfield20"></td>
            </tr>
            <tr>
              <td><label for="textfield21">Fecha de apertura:</label></td>
              <td><input type="text" name="textfield11" id="textfield21"></td>
            </tr>
            <tr>
              <td><label for="textfield22">Saldo actual:</label></td>
              <td>$
                <input type="text" name="textfield12" id="textfield22"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="cuSave" id="cuSave" value="Guardar"></td>
            </tr>
          </tbody>
        </table></td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>