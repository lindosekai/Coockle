<html>
	<head>
		<title>.: Coockle :.</title>

        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="jqplugins/jquery-ui.custom.min.js"></script>
        <script src="jqplugins/jquery.mousewheel.js"></script>
        <script src="jqplugins/jquery.jscrollpane.min.js"></script>
        <script type="text/javascript" src="jqplugins/jquery.lightbox-0.5.js"></script>
	    <link rel="stylesheet" type="text/css" href="jqplugins/jquery.lightbox-0.5.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="coock.forms.css">		
		<link rel="stylesheet" type="text/css" href="coock.riels.css">
		<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.1.custom.css">
		<link rel="stylesheet" type="text/css" href="jqplugins/jquery.jscrollpane.css">
		<link rel="stylesheet" type="text/css" href="coock.tips.css">
		<link rel="stylesheet" type="text/css" href="coock.topmenu.css">
		<link rel="stylesheet" type="text/css" href="coock.index.css">
 	</head>
	<body>
<? include "components.php" ;indexmenu(); ?>
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
<div id="dialog" title="Basic dialog">
  <p style="display : none;">Bienvenido a la pagina de registro Coockle, aqui podras encontrar y compartir con tus amigos muy buenas recetas, tips de cocina, nutricion, etc.</p>
</div>
<script>
// $('#dialog').dialog({modal:true});
var title = document.getElementById('tit');
var optx = document.getElementById('optx');
optx.style.display = "none";
title.addEventListener("click",function(){
	if(optx.style.display=="none")
		optx.style.display="block";
	else optx.style.display = "none";
})
</script><br><br>
<div id="searchbox">
<ul id="inopts">
	<li><a href='login.php'>Ingresar</a></li>
	<li><a href='register.php'>Registrarse</a></li>
</ul>
	<div id="content">
		<form name="buskr" id="buskr">
		<table>
			<tr>
				<td id='txt'>Buscar : </td>
				<td id='srch'><input type='text' name='query'></td>
			</tr>
		</table>
	</form>
	</div>
</div>

<div id="all">
	<div id='leftbr'>
		<div id='container'>
		    <div id='btxt' style='font-size : 30px ; color :#333 ;'>Publica y Comparte tus Recetas de Cocina</div><br><br>
		    <div id='ltxt' style='font-size : 18px ; color : #333 ;'>Se parte de una comunidad que comparte sus recetas con el mundo!.</div>
	    </div>
	</div>
	<div id='rightbr'>
		<div id='container'><br><br><br>
			<div id='img' ><img src='sushi.jpg' style="width : 280px ;"></div>
		</div>
	</div>
	<div style="clear : both ;"></div>
<br><br></div>
<hr style=' border-top :1px  #aaa solid;border-bottom :1px  white solid; height : 0px;'>

<?php footer(); ?>
<script src="coock.places.js"></script>
	<script>
	var query = document.buskr.query;
    var all = document.querySelector('#all');

	document.buskr.addEventListener("submit",function(e){
			e.preventDefault();
			if(query.value!=""){
                var data = $("#buskr").serialize();
                var xhr = new XMLHttpRequest();
                xhr.open("get","search_tips.php?"+data,false);
                xhr.send();
                all.innerHTML = xhr.responseText;
		}
	});
	</script>


</div>

</body>
</html>
