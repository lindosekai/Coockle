<?php
// $username = $_COOKIE['username'];
// $id_user = $_COOKIE['id_user'];
?>
<html>
	<head>
		<title>.: Coockle :.</title>
		<link rel="stylesheet" type="text/css" href="coock.forms.css">
		<link rel="stylesheet" type="text/css" href="coock.ingredients.css">
	 	</head>
	<body>
    <div id="topbar">
    <div class="opt">Inicio</div>
    <div class="opt">Noticias</div>
    <div class="opt">Notificaciones</div>
    <div class="opt">Explorar</div>
    <div class="opt">Salir</div>
    <div id="tit">Coockle</div>
    </div>
<section id="all">
<br><h3>Lista de Ingredientes</h3>
<div id="search">
	<p>Busqueda : <input type='text' id='ingredient'></p>
	<span id='look'></span>
	<script>
		document.getElementById('ingredient').addEventListener('keyup',function(e){
			document.getElementById('look').innerHTML = "buscar : " + document.getElementById('ingredient').value + ", [ENTER] para buscar." ;
			if(e.keyCode==13){
				console.log("bucando....");
			}
		})
	</script>
</div>
<?php
include("CoockAPI/coock.sqlbuilder.basic.php");
include("CoockAPI/coock.ingredients.php");
include("CoockAPI/coock.ingredients.gallery.php");
/// --------------- ------------------------------- ///

$builder = new SQLBuilderBasic("ingredients");
$ingredients = new Ingredients($builder);
$ingredients->getIngredients();
?>
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

</body>
</html>
