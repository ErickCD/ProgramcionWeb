<!DOCTYPE html>
<head>
<title>Practica 04 -> Formularios. </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/page.css" type="text/css" media="all" />
<script languaje="javaScript" type="text/javascript" src="./js/ajax.js"></script>
<script languaje="javaScript" type="text/javascript" src="./js/operations.js"></script>

<?php
 require "../../DOM/connectionDB.inc";
 require "../../DOM/operationDB.inc";
 
 $usuario = new operationDB("practicas","erick","localhost","root");
?>

<script language="javascript">
 
</script>
</head>
<body>


<div class="main">
  <div class="cabecera">
<div class="mensage_error">Hellos world</div>
<div class="mensage_warning">Hellos world</div>
<div class="mensage_information">Hellos world</div>
<div class="mensage_question">Hellos world</div>

   <h4>Banco Banamex</h4> 
  </div> 

  <div class="opciones">
   <div class="menu_lateral" onclick="loadRegistry();" ><font size="6" face="lucida console" >Registrar</font></div>
   <div class="menu_lateral" onclick="loadClients();"><font size="6" face="lucida console"  >Clientes</font></div>
  </div>

  <div id="contenido" class="contenido"> 
   <div id="registro"></div>
   <div id="clientes"></div>

</div>
</div>

</body>
</html>
