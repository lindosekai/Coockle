<?php
/**
* @file user_login
* @brief iniciar la session del usuario, busca en base de datos el nombre de usuario y contrase~a e inicia la session correspondiente
**/
$usern = $_POST["username"];
$password = $_POST["password"];
$passwrd = sha1(md5($password));

// -- User Search -- //
include "CoockAPI/coock.sqlbuilder.basic.php";
include "CoockAPI/coock.users.php";
$users = new Users(new SQLBuilderBasic("users"));
$user = $users->getUserByCredentials($usern, $passwrd);
//print "".$usern." -- $password";
if(isset($user)){
	$username = $user->getUserName();
	$id_user = $user->getIdUser();
	$name = $user->getName();
	$lname = $user->getLastName();
	setcookie("username",$username);
	setcookie("name",$name);
	setcookie("lastname",$lname);
	setcookie("id_user",$id_user);
// print ">$username<br>";
// print ">$id_user<br>";

	print "<script>window.location='home.php';</script>";
}else {
	print "<script>window.location='index.html';</script>";
}
?>
