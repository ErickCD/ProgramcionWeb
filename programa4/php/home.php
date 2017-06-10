<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
</head>



<body>
<!--Navbar-->
<nav>
	<div class="nav-wrapper #37474f blue-grey darken-3">
		<a href="#" class="brand-logo right">Logo</a>
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		
		<ul id="nav-mobile" class="left hide-on-med-and-down">
			<li><a href="login.php">Ingresar</a></li>
		</ul>
		<ul class="side-nav" id="mobile-demo">
			<li><a href="login.php">Ingresar</a></li>
		</ul>
	</div>
</nav>



<?php
	include('plantillas/plantilla_footer_pi.php')
?>


<!-- Scripts -->
	<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	
	<script>
		$(document).ready(function(){
			$(".button-collapse").sideNav();
		});
	</script>
</body>
</html>