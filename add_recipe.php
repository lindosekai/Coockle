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
<h2 id='recipe_title'><input type="text" id='r_title' placeholder="Titulo de la Receta"></h2>
<br><img src="" id="imgsrc" style="width : 35% ;">
<form action="" method="post" enctype="multipart/form-data" name="uploadform">
<input type="file" name="file1" id="ingredient_image">
<script>
	var img = document.getElementById("imgsrc");

    document.getElementById("ingredient_image").addEventListener("change",function(e){
    	var file = this.files[0];
    	console.log(file);
    	var data = new FormData();
    	data.append("file1",file);
    	
    	var xhr = new XMLHttpRequest();
    	xhr.open("post" , "process_recipe_img.php" , true);
    	xhr.onreadystatechange = function(e){
					if(this.readyState==4){
						
//						console.log("files/" + this.responseText);
						img.src = "imgs/" + this.responseText;
						//console.log("Listo!!");
					}else {
						console.log("cargando ...");
					}
				}
    	xhr.send(data);
    });
    
</script>

</form>
	<br><br>
<section id="leftbr">
<div id="options">
<h3>Ingredientes</h3>
<br>
<ol id='ingredient_list' style="list-style : circle ;">
<li><input type='text' id='ingredient1' placeholder="Escribe Ingrediente"></li>
</ol>
<br>
<hr>
<h3>Proceso</h3>
<br>
<ol id='process_list'>
<li><textarea id='process1' placeholder="Escribe el Proceso"></textarea></li>
</ol>
<script src='coock.recipe.conf.js'></script>
<script src='coock.ingredient.list.js'></script>
<script src='coock.process.list.js'></script>
<div id="option">Ayuda de Expertos.</div>
<div id="option">Ayuda en la Redaccion</div>
</div>
</section>

<section id="rightbr">
<section id="c">
<ul id="optx">
<li><span><b>+<?php print $username;?></b></span></li>
<li><span>Mis Recetas</span></li>
<li><span>Favoritas</span></li>
<li><span>Siguiendo</span></li>
<li><span>Seguidores</span></li>
</ul>
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
		<script src="coock.places.js"></script>
</body>
</html>
