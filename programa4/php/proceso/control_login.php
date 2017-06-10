<?php
$arrLogin = $_POST['login'];

require('../../DOM/DAO/DAOLogin.php');
$DAOLogin = new Login();

$DAOLogin->__setnomUsuario($arrLogin[0]);
$DAOLogin->__setPass($arrLogin[1]);

require('../../DOM/Bussines.php');
$claseBuss = new Buss();
if($claseBuss->bussValidaUsuario($DAOLogin) === 0){
	unset($DAOLogin, $claseBuss);
	header('location: ../dashboard.php');
	die();
}else{
	unset($DAOLogin, $claseBuss);
	header('location: ../login.php');
	die();
}

?>