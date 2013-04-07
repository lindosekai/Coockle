<?
/**
* @file save_user.php
* @brief obtiene los valores de registro de usuario y agregar un usuario a la base de datos
* y por consiguiente al sistema Coockle.
**/
$username = $_POST["username"];
$password = $_POST["password"];
$confimation = $_POST["confimation"];
$email = $_POST["email"];
$name = $_POST["name"];
$last_name = $_POST["last_name"];

print "-----------------------------------------------------<br>";
print "Usuario : $username<br>";
print "Password : $password<br>";
print "Email : $email<br>";
print "Full Name : $name $last_name<br>";
print "-----------------------------------------------------<br>";


?>
