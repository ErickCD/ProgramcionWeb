<?php
class connectionDB
{
 private $host = "mysql.hostinger.es";
 private $user = "u891629398_erick";
 private $password = "cdb54fc2";
 private $dataBase = "u891629398_pract";
 private $connection;

function connectionDB(){
  $this->connectDataBase();
}

function setHost($host = "JDBC:\\mysql.hostinger.es")
{
 $this->host=$host;
}

function setUser($user = "u891629398_erick")
{
 $this->user=$user;
}

function setPassword($password = "cdb54fc2")
{
 $this->password=$password;
}

function setDataBase($dataBase = "u891629398_pract")
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
  //print ("Conected corretamente. \n </br>");
  
  $result = mysql_select_db($this->getDataBase(),$this->getConnection()) 
  or die('No se pudo seleccionar la base de datos');
  //print ("\nBase de datos seleccionado. </br>");

  //echo "Result connection -> " . $this->getConnection() . "</br>";
  //echo "Result select data base -> " . $result;
}

function disconnectDataBase()
{
  mysql_close($this->getConnection());
}

}

?>