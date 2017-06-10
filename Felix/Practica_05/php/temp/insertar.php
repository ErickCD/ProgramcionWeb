<?php

$identificador = $_POST['identificador'];
$nombre = $_POST['nombre'];
$a_paterno = $_POST['a_paterno'];
$a_materno = $_POST['a_materno'];
$rfc = $_POST['rfc'];
$typeOperation = $_POST['typeOperation'];

echo "Nombre : ".$nombre."</br>";
echo "A. Paterno : ".$a_paterno."</br>";
echo "A. Materno : ".$a_materno."</br>";
echo "RFC : ".$rfc."</br>";

 require "./connectionDB.inc";
 require "./operationDB .inc";
 
 $usuario = new operationDB("practicas","1234","localhost","root");

 if ($typeOperation == "edit"){
     $usuario->queryDB("update pr_cliente set cl_nombre = \"".$nombre."\",cl_apellidoP = \"".$a_paterno."\",cl_apellidoM = \"" .$a_materno."\",cl_rfc = \"".$rfc."\" where cl_noCliente = ".$identificador.";");
  }else if ($typeOperation == "delete") {
     $usuario->queryDB("delete from pr_cliente where cl_noCliente = ".$identificador.";");
 } else {
    $usuario->queryDB("insert into pr_cliente values(0,\"".$nombre."\",\"".$a_paterno."\",\"" .$a_materno."\",\"".$rfc."\");");
 }
?>