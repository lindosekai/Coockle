<?php
/**
* @file home.php
* @brief esta es la pagina inicial para un usuario loggeado, aqui esta organizada toda la informacion relevante
**/
$username = $_COOKIE['username'];
$name = $_COOKIE['name'];
$lname = $_COOKIE['lastname'];
$id_user = $_COOKIE['id_user'];
// print "$username ----".$id_user;
if($id_user=="" || $username==""){ print "<script>window.location='logout.php';</script>"; }
include("components.php");
include "CoockAPI/coock.tips.php";
include "CoockAPI/coock.users.followers.php";
Tips::$author = $id_user;
UsersFollowers::$my_id=$id_user;
?>
<html>
	<head>
		<title>.: Coockle :.</title>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script src="jqplugins/jquery.mousewheel.js"></script>
        <script src="jqplugins/jquery.jscrollpane.min.js"></script>
		<link rel="stylesheet" type="text/css" href="coock.forms.css">		
		<link rel="stylesheet" type="text/css" href="coock.riels.css">
		<link rel="stylesheet" type="text/css" href="jqplugins/jquery.jscrollpane.css">
		<link rel="stylesheet" type="text/css" href="coock.tips.css">
		<link rel="stylesheet" type="text/css" href="coock.topmenu.css">
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
<section id="leftbr" style=" width : 70% ; ">
<br>
<div id='riels'>
<div id="riel-people" style="margin-left : -100px ;">
	<div id="rp-title">Siguiendo</div><br>
	<div id="rp-content">
<?php
$flwrs = simplexml_load_string(UsersFollowers::getFollowing());
foreach($flwrs->follower as $flwr){
print <<<USR
<br><div id='userbox'>
    <div id='ub_head'>
    	<div id='photo'></div>
    	<div id='name'>$flwr->flwrname $flwr->flwrlname</div>
    </div>
</div>
USR;
}
?>

</div>
</div>
<!--  -->
<div id='riel-tpx'>
	<div id='rtx-title'>Tips</div>
	<div id='rtx-context'>
<form id="add_tip" name="addtip" method="post" enctype="multipart/form-data" action="publish_tip.php">
	<div id="tipform">
		<div id="title"><input type="text" name="tip_title" placeholder=""></div>
		<div id="text"><textarea name="tip_description" placeholder="Tus trucos de cocina ?"></textarea></div>
		<div id="butt"><input type="file" name="pic"><input type="submit" value="Publicar Tip" name="tippr"></div>
	</div>
	<script src='coock.savetip.js'>
	</script>
</form>
<? include("get_tips.php");?>
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
});	</script>
<div style="clear : both ;"></div>
</section>
<div style="clear : both ;"></div>
</section>
<?php footer(); ?>
<script src="coock.places.js"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>			<div id="option">El servicio esta en pruebas, hay pocas secciones del sistema habilitadas, y las que estan habilitadas tal vez presenten errores, si presenta algun estado de inestabilidad del software favor de reportar a <i>neopathic@gmail.com</i>.</option>
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
