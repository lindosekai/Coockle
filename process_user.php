<?php
// creation 15/FEB/2013 by lindosekai
include("CoockAPI/coock.database.php");
include("CoockAPI/coock.users.php");
include("CoockAPI/coock.sqlbuilder.basic.php");
// ----- POST SECTION ----//
$usern = $_POST["username"];
$password = $_POST["password"];
$passwrd = sha1(md5($password));
$name = $_POST["name"];
$lname = $_POST["last_name"];
$email = $_POST["email"];
// ---------------------- //

$user = new User();
$user->setUsername($usern);
$user->setPassword($passwrd);
$user->setName($name);
$user->setLastName($lname);
$user->setEmail($email);

$users = new Users(new Database(), new SQLBuilderBasic("users"));
$users->addUser($user);
print "<script>window.location='add_user.php';</script>";

?>
