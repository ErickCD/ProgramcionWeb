<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ingreso a la aplicación.</title>

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
	
	<div class="container">
	
	<br><br>
	
	<div class="row">
		<div class="col m3 s12">
			
		</div>
		<div class="col s12 m6">
			<div class="card blue-grey darken-1">
           	<form action="proceso/control_login.php" method="post">
            	<div class="card-content white-text">
              		<span class="card-title">Ingrese por favor.</span>
              		<!--
              		<div class="input-field row">
              			<label class="active" for="login[]">Tipo de usuario:</label>
              			<select required name="login[]">
              				<option value="Alumno" selected>Alumno</option>
              				<option value="Egresado">Egresado</option>
              				<option value="Encargado">Encargado</option>
              				<option value="Administrador">Administrador</option>
              			</select>
              		</div>
              		-->
              		<div class="input-field">
              			<div class="row">
              				<label class="active" for="login[]">Nombre:</label>
              				<input type="text" class="center-align" name="login[]" required>
              			</div>
              		</div>
              		
              		<div class="input-field">
              			<div class="row">
              				<label for="login[]" class="active">Contraseña:</label>
              				<input type="password" class="center-align" name="login[]" required>
              			</div>
              		</div>
            	</div>
            	
            	<div class="card-action right-align">
              		<input class="waves-effect waves-light btn" type="submit" value="Ingresar">
            	</div>
            </form>
			</div>
		</div>
    </div>
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