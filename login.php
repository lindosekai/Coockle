<html>
	<head>
		<title>.: Inicio de Sesion :.</title>
		<link rel="stylesheet" type="text/css" href="coock.forms.css">
		<link rel="stylesheet" type="text/css" href="coock.riels.css">		 	</head>
	<body>
    <div id="topbar">
    <div class="opt">Inicio</div>
    <div class="opt">Servicio</div>
    <div class="opt">About</div>
    <div id="tit">Coockle</div>
    </div>
<section id="all">
<br><br>

<section id="leftbr">
<div id='riels'>
<div id="riel-ingresar" style="margin-left : -100px ;">
	<div id="ri-title">Integrate</div><br>
	<div id="ri-content">
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
</div><br>
<div id='img'><img src='icons2/copa2.png' style="width : 300px ;"></div>
</div>
</div>
<!--  -->
<div id='riel-login'>
	<div id='log-title'>Inicar Sesion</div>
	<div id='log-content' >
		<form method="post" action="user_login.php" name='frm'>
			<br><br><table>
				<tr>
					<td>Usuario : </td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password : </td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Iniciar Sesion"></td>
				</tr>
			</table>
		</form>
<script>
document.frm.addEventListener('submit',function(e){
	if(document.frm.username.value=="" || document.frm.password.value==""){
		e.preventDefault();
	}
});
</script>
</div>
</div>
</div>

<section id="rightbr">
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
</body>
</html>
