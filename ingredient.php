<?php
/**
* @file ingredient.php
* @brief Aloja la pagina para un ingrediente
* @date mod1 18 february 2013
* @date mod2 20 february 2013
* @author mod1 lindosekai
* @author mod2 lindosekai
* @var username el nombre del usuario recogido apartir la coockie usernmae que se asigna cuando el usuario es loggeado
**/
$username = $_COOKIE['username'];
$id_user = $_COOKIE['id_user'];
include("components.php");
?>
<html>
	<head>
		<title>.: Coockle :.</title>
		<link rel="stylesheet" type="text/css" href="coock.forms.css">
		<link rel="stylesheet" type="text/css" href="coock.ingredients.css">
		<script src='/jquery.min.js'></script>
	 	</head>
	<body onload="loadComments()">
<?php topmenu(); ?>
<script src="coock.places.js"></script>
<section id="all">
<?php

include("CoockAPI/coock.sqlbuilder.basic.php");
include("CoockAPI/coock.ingredients.php");
include("CoockAPI/coock.ingredients.gallery.php");
/// --------------- ------------------------------- ///

$builder = new SQLBuilderBasic("ingredients");
$ingredients = new Ingredients($builder);
$id_ingredient = $_GET['id_ingredient'];
$ingredient = $ingredients->getIngredientById($id_ingredient);
print "<div id='ingredient_title'>".$ingredient->getParameters()['ingredient_name']."</div>";
print "<a href=''>Seguir</a>";
print "<div id='ingredient_desc'>".$ingredient->getParameters()['ingredient_description']."</div>";

?>
<br><br>
<div id="ingredient_comments">
	Comentarios : 
	<div id="form_comment">
		<form id="comms">
		<input type="hidden" name="id_ingredient" value="<?print $id_ingredient; ?>">
		<input type="hidden" name="id_user" value="<?print $id_user;?>">
		<input type="text" id='comment_tx' name="comment_text">
		</form>
	</div>
	<div id="text_comments"></div>
</div>
<script>
	var tcom = document.getElementById("text_comments");
	var comment = document.getElementById("comment_tx");
	var theform = document.getElementById("comms");
	
	comms.addEventListener("submit",function(e){
		e.preventDefault();
			var data = $("form#comms").serialize();
			var xhr = new XMLHttpRequest();
			var url = "post_ingredient_comment.php?"+data;
			xhr.open("get",url,true);
			xhr.send();
			comment.value='';
			loadComments();
	})
	
	function loadComments(){
			var xhr2 = new XMLHttpRequest();
			var url = "load_ingredient_comments.php?id_ingredient="+"<?print $id_ingredient;?>";
			xhr2.open("get",url,true);
			xhr2.send();
			xhr2.onreadystatechange = function(e){
				if(this.readyState ==4){
   			tcom.innerHTML = xhr2.responseText;					
				}
			}
		
	}
</script>
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
