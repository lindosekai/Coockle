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
 	</head>
	<body>
<? include "components.php" ;topmenu(); ?>
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
</script>

<section id="all">
<br>
<section id="leftbr" style=" width : 70% ; ">
<br>
<div id='riels'>
<div id="riel-people" style="margin-left : -100px ;">
	<div id="rp-title">Beneficios</div><br>
	<div id="rp-content">
<br><div id='userbox'>
    <div id='ub_head'>
    	<div id='name'>Compatir</div>
    </div>
</div>
<br><div id='userbox'>
    <div id='ub_head'>
    	<div id='name'>Aprender</div>
    </div>
</div>
<br><div id='userbox'>
    <div id='ub_head'>
    	<div id='name'>Encontrar</div>
    </div>
</div>
</div>
</div>
<!--  -->
<div id='riel-tpx'>
	<div id='rtx-title'>Registro</div>
	<div id='rtx-content' >
<div id="frm"><br>
	<form method="post" action="process_user_data.php" name="registr">
		<table>
		<tr>
			<td>Nombre : </td>
			<td><input type="text" name="name"></td>
		</tr>


		<tr>
			<td>Apellido : </td>
			<td><input type="text" name="last_name"></td>
		</tr>
		<tr>
			<td>E-Mail : </td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>Nombre de Usuario : </td>
			<td><input type="text" name="username"></td>
		</tr>

		<tr>
			<td>Password : </td>
			<td><input type="password" name="password"></td>
		</tr>

		<tr>
			<td>Confirmacion : </td>
			<td><input type="password" name="confirm"></td>
		</tr>
		<tr>
			<td>Ocupacion : </td>
			<td>
				<select name="ocupation" style="padding : 5px ; width : 200px ;">
					<option value="0">-- Seleccione --</option>
					<option value="1"> Entusiasta </option>
					<option value="2"> Cheff </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nacionalidad : </td>
			<td>
				<select name="nationality" style="padding : 5px ; width : 200px ;">
					<option value="0">-- Seleccione --</option>
					<option value="1"> Mexico</option>
					<option value="2">Estados Unidos</option>
					<option value="3">Argentina</option>
					<option value="4">Brazil</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Sexo : </td>
			<td>
				<select name="gender" style="padding : 5px ; width : 200px ;">
					<option value="0">-- Seleccione --</option>
					<option value="1">Hombre</option>
					<option value="2">Mujer</option>
					<option value="3">Otro</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Relacion : </td>
			<td>
				<select name="relationship" style="padding : 5px ; width : 200px ;">
					<option value="0">-- Seleccione --</option>
					<option value="1">Soltero</option>
					<option value="2">Comprometido</option>
					<option value="3">Casado</option>
					<option value="4">Divorciado</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>Al Hacer click en registrarse acepta los <a href=''>Terminos de Uso y Condiciones</a> de Coockle.
			</td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" value="Registrarse" style='width : 200px ;'></td>
		</tr>
		</table>
	</form>
	<script>
		document.registr.addEventListener("submit",function(e){
			var reg = document.registr;
			if(reg.username.value =="" || reg.last_name.value=="" || reg.name.value=="" || reg.email.value=="" || reg.password.value=="" || reg.confirm.value=="" || reg.ocupation.value=="0" || reg.nationality.value=="0"||reg.gender.value=="0" || reg.relationship.value=="0"){
				e.preventDefault();
				alert("No debe haber Campos Vacios");
			}
		});
	</script>
</div>
	</div>
</div>
<div style=''></div>
</div>

	<!-- -->

</section>

	<script>
$(function()
{
$('#riel-tix #rtx-content').css('height','500px');
$('#riel-tix #rtx-content').jScrollPane();
$('#tip_imurl a').lightBox({fixedNavigation:true,width : '300px'});


});	</script>
<div style="clear : both ;"></div>
</section>
<div style="clear : both ;"></div>
</section>
<?php footer(); ?>
<script src="coock.places.js"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<script type="text/javascript">
  window.___gcfg = {lang: 'es-419'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</div>

</body>
</html>
