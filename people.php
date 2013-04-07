<?php
/**
* @file people.php
* @brief Muestra la busqueda de personas
**/
$username = $_COOKIE['username'];
$name = $_COOKIE['name'];
$lname = $_COOKIE['lastname'];
$id_user = $_COOKIE['id_user'];

// print "$username ----".$id_user;
if($id_user=="" || $username==""){ print "<script>window.location='logout.php';</script>"; }
include("components.php");
include "CoockAPI/coock.tips.php";
Tips::$author = $id_user;
?>
<html>
	<head>
		<title>.: Coockle :.</title>
		<link rel="stylesheet" type="text/css" href="coock.forms.css">
		<link rel="stylesheet" type="text/css" href="coock.tips.css">
		<link rel="stylesheet" type="text/css" href="coock.users.css">
		<link rel="stylesheet" type="text/css" href="coock.topmenu.css">
		<script src='utils/ajax/load_users.js'></script>
		<script src='jquery.min.js'></script>
 	</head>
	<body>
<? topmenu(); ?>
<ul id="optx">
<li><span><a href='profile.php'><?php print $username;?></a></span></li>
<li><span><a href="admin.php">Panel de Control</a></span></li>
<li><span><a href="add_recipe.php">Agregar Recetas</a></span></li>
<li><span>Mis Perfil</span></li>
<li><span>Mis Recetas</span></li>
<li><span>Favoritas</span></li>
<li><span>Siguiendo</span></li>
<li><span>Seguidores</span></li>
</ul>
<script>
var title = document.getElementById('tit');
var optx = document.getElementById('optx');
optx.style.display = "none";
title.addEventListener("click",function(){
	if(optx.style.display=="none")
		optx.style.display="block";
	else optx.style.display = "none";
})
</script>

<section id="all">
<br>
<section id="leftbr">
<br>

<div id="options">
<div id="option" style="width : 600px ;">
	<div id='theform'>
		<form name="users" id='users'>
			<input type="text" name="data" id="fuser" style='width : 400px ;'>
			<input type="submit" value="buscar" id='fsearch' style='width : 100px ; padding : 4px ;'>
		</form>
	</div>
</option>
<div id='rx'></div>
<script>
var rx = document.getElementById("rx");
var fx = document.users;
fx.addEventListener("submit",function(e){
	e.preventDefault();
	var data = $("form#users").serialize();
	console.log(data);
	rx.innerHTML = loadUsers(data);
});
</script>
<br><br><br><br>
<div id="option">El servicio esta en pruebas, hay pocas secciones del sistema habilitadas, y las que estan habilitadas tal vez presenten errores, si presenta algun estado de inestabilidad del software favor de reportar a <i>neopathic@gmail.com</i>.</option>
</div>
</section>

<section id="rightbr">
<section id="c">
</section>
</section>
<div style="clear : both ;"></div>
</section>
<?php footer(); ?>
<script src="coock.places.js"></script>
<script>
</script>
</div>
</body>
</html>
