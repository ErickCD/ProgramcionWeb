<?php
class operationDB extends connectionDB
{
private $result;

  function operationDB(){
     connectionDB::connectionDB();
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
public function closedb(){
	$this->disconnectDataBase();
}
}

?>