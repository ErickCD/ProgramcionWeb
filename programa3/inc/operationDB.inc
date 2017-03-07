<?php
class operationDB extends connectionDB
{
private $result;

  function operationDB($dataBase,$password,$host,$user){
     connectionDB::connectionDB($dataBase,$password,$host,$user);
  }

public function queryDB($sql)
{
 $this->result = mysql_query($sql,$this->getConnection()) ;
}

private function getResult()
{
 return $this->result;
}

public function getRowsDB()
{
if ($rowsDB = mysql_fetch_array($this->getResult(),MYSQL_ASSOC))
{
  return $rowsDB;
} else {
  return false;
}

}


}

?>