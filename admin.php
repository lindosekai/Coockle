<?php
$username = $_COOKIE['username'];
$id_user = $_COOKIE['id_user'];
if($id_user==""){ print "<script>window.location='login.php';</script>"; }
include("components.php");
?>
<html>
	<head>
		<title>.: Coockle :.</title>
		<link rel="stylesheet" type="text/css" href="coock.forms.css">
		 	</head>
	<body>
<?php topmenu(); ?>
<section id="all">
<br><br>
<h3>Wellcome <?print $username;?> this is the Control Panel.</h3>

<section id="leftbr">
<div id="options">
<div id="option">Bienvenido a la pagina de inicio de administrador del servicio <b>Coockle</b>.</div>
<img src='engrane.png' style='width : 300px ;'>
<div id="option">Por medio de esta seccion se podra modificar, eliminar ciertos datos.</div>
<div id="option">Cualquier inestabilidad reportar a <i>neopathic@gmail.com</i>.</option>
</div>
</section>

<section id="rightbr">
<section id="c">
<div id="panel">
<div id="title">Control Panel</div>
<div id="cnt">
<ul id="optx2">
<li id="ing"><span>Ingredientes</span></li>
<li><span>Tipos de ingredients</span></li>
<li><span>Galerias</span></li>
<li><span>Seguidores</span></li>
<li><span>Comentarios</span></li>
</ul>
</div>
</div>
</section>
</section>
<div style="clear : both ;"></div>
</section>
<br><br><br><br><br><br><br><br>
<div id="footer"><br>NeopathIC &copy; 2013 Todos los Derechos Reservados<br><br>
<ul>
<li><a href="">Terminos de Uso</a></li>
<li><a href="">Politicas de Privacidad</a></li>
<li><a href="">Developers API</a></li>
<li><a href="">Pricing</a></li>
</ul>
<br><br><br>
</div>
<script src="admin_menu.js"></script>
		<script src="coock.places.js"></script>
</body>
</html>
