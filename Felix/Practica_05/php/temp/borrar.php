<?php
$identificador = $_POST['identificador'];

echo "Nombre : ".$identificador."</br>";

 require "./connectionDB.inc";
 require "./operationDB .inc";
 
 $usuario = new operationDB("practicas","1234","localhost","root");    ;

 $usuario->queryDB("delete from pr_cliente where cl_noCliente = ".$identificador.";");

?>