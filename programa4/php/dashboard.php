<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
<!--Let browser know website is optimized for mobile-->
</head>


<body>
<nav>
	<div class="nav-wrapper #37474f blue-grey darken-3">
	
		<a href="../index.php" class="brand-logo right">ITSTA</a>
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		
		<ul class="left hide-on-med-and-down">
			<li><a href="#">Información</a></li>
			<li><a href="../index.php">Salir</a></li>
		</ul>
		
		<ul class="side-nav" id="mobile-demo">
			<li><a href="#">Información</a></li>
			<li><a href="../index.php">Salir</a></li>
		</ul>
		
		
		
	</div>
</nav>

<?php
	require('../DOM/Bussines.php');
	$claseBussines = new Buss();
	$arrayTabla = $claseBussines->bussTablaPrincipal();
?>

<div class="container">
	
<h2>Control bancario</h2>

     <form method="post" action="proceso/acciones.php">
      <table>
        <thead>
          <tr>
              <th>Número cliente</th>
              <th>Nombre cliente</th>
              <th>Número sucursal</th>
              <th>Nombre sucursal</th>
              <th>Número cuenta</th>
              <th>Tipo cuenta</th>
              <th>Saldo actual</th>
              <th>Nombre cotitular</th>
              <th>Actualizar</th>
              <th>Borrar</th>
          </tr>
        </thead>

        <tbody>
         <?php
			foreach( $arrayTabla as list($a, $b, $c, $d, $e, $f, $g, $h)){
				echo "<tr>";
					echo "<td>$a</td>";
					echo "<td>$b</td>";
					echo "<td>$c</td>";
					echo "<td>$d</td>";
					echo "<td>$e</td>";
					echo "<td>$f</td>";
					echo "<td>$g</td>";
					echo "<td>$h</td>";
					echo "<td><button type=\"submit\" name=\"editar\" id=\"editar\" value=\"".$a."\"><img src=\"../img/actualizar.jpg\"></button></td>";
					echo "<td><button type=\"submit\" id=\"borrar\" name=\"borrar\" value=\"".$a."\"><img src=\"../img/eliminar.jpg\"></button></td>";
				echo("</tr>");
			}
		 ?>
        </tbody>
      </table>
	</form>


</div>


<?php
	include('plantillas/plantilla_footer_pi.php');
?>
	
	<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	
	<script>
		$(document).ready(function(){
			$(".button-collapse").sideNav();
			$('select').material_select();
		});
	</script>
</body>
</html>