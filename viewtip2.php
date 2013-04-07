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
include "CoockAPI/coock.tips.tags.php";
include "CoockAPI/coock.users.followers.php";
$id_tip = $_GET['id_tip'];
Tips::$author = $id_user;
UsersFollowers::$my_id=$id_user;
$tip = Tips::getTipById($id_tip);
?>
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
	<div id="rp-title">Siguiendo</div><br>
	<div id="rp-content">
<form name="" method="post" action="add_tag.php">
			<input type="hidden" name="tag_type" value="tip">
			<input type='hidden' name='id_tip' value="<?print $id_tip;?>">
			<input type='hidden' name='id_tip_tag_group' value="<?print $tip->getIdTipTagGroup();?>">
			<input type="text" name="tip_tag">
		</form>
		<?
		TipTags::$id_tip_tag_group = $tip->getIdTipTagGroup();
		TipTags::$builder = new SQLBuilderBasic("tip_tag");
		$tags =  simplexml_load_string(TipTags::getTipTags());
//		print_r($tags);
		print "<table>";
		foreach($tags->tip_tag as $tg){
			print "<tr>";
				print "<td>".$tg->tag;
				print "</td>";
				print "<td>x".$tg->num_tags;
				print "</td>";
			print "</tr>";
		}
		print "</table>";
		?>

</div>
</div>
<!--  -->
<div id='riel-tpx'>
	<div id='rtx-title'>Tips<span style='float : right ; font-size : 20px ;font-weight : bold ;' id='addtip'>+</span></div>
	<div id='rtx-content' >
<?

print "<div id='tip'>";
	print "<div id='tip_head'>";
//	print "<div id='tip_conf'><img src='icons/pencil.png'></div>";
	print "<div id='tip_time'>".$tip->getTipTime()."</div>";
	print "<div id='tip_author'>".$username."</div>";
	print "</div>";
	print "<div id='tip_body'>";
	print "<div id='tip_title' style='font-size : 26px ;'>".$tip->getTipTitle()."</div>";
	print "<div id='tip_description' style='padding : 20px; '>".$tip->getTipDescription()."</div>";
	print "</div>";
	print "<div id='tip_foot'>";
	print "</div>";
	print "</div>";

?>
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
