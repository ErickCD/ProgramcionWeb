<?php
class connectionDB
{
 private $host = "localhost";
 private $user = "root";
 private $password = "erick";
 private $dataBase = "";
 private $connection;

function connectionDB($dataBase,$password,$host,$user){
  $this->dataBase = $dataBase;
  $this->password = $password;
  $this->host = $host;
  $this->user = $user;
  $this->connectDataBase();
}

function setHost($host = "localhost")
{
 $this->host=$host;
}

function setUser($user = "root")
{
 $this->user=$user;
}

function setPassword($password)
{
 $this->password=$password;
}

function setDataBase($dataBase)
{
 $this->dataBase=$dataBase;
}

function getHost()
{
 return $this->host;
}

function getUser()
{
 return $this->user;
}

function getPassword()
{
 return $this->password;
}

function getDataBase()
{
 return $this->dataBase;
}

function getConnection()
{
 return $this->connection;
}

function connectDataBase()
{
  $this->connection = mysql_connect($this->getHost(),$this->getUser(),$this->getPassword())
  or die('No se pudo conectar \n' . mysql_error());
  //print ("Conectado corretamente. \n");
  
  $result = mysql_select_db($this->getDataBase(),$this->getConnection()) 
  or die('No se pudo seleccionar la base de datos');
  //print ("\nBase de datos seleccionado.");

}

function disconnectDataBase()
{
  mysql_close($this->getConnection())   
  or die('No se pudo cerrar la conección.');
}

}

?>