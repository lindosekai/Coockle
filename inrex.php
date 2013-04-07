<html>
<head>
<title>.: Coockle :.</title>
<style>
#container {
margin-top : 15% ;
}

#title {
font-size : 80px ;
color : maroon ;
}
input[type="text"] {
border : 1px black solid;
width : 40%; 
padding : 5px ;
}

input[type="button"]{
padding : 4px ;
}

#top {
position : absolute ;
top : 0px ;
left : 0px;
background : #434343 ;
width : 100% ;
color : white ;
font-weight : bold ;
}

#top #op {
float : left ;
margin-left : 20px ;
padding : 1px ;
}
#footer {
background : rgba(64,64,64,0.4);
width : 100%;
position : absolute ;
left : 0px;
bottom:0px ;
}
a:link,a:hover, a:visited {
color:white;
text-decoration : none ;
}

#title img {
width : 500px ;
height : 200px ;
}

</style>
</head>
<body>
<div id="top">
<div id="op"><a href="home.php">Inicio</a></div>
<div id="op"><a href='index.html'>Recetas</a></div>
<div id="op"><a href='ingex.html'>Ingredientes</a></div>
<div id="op"><a href='inrex.php'>Restaurantes</a></div>
<div id="op">Explorar</div>

<div id="op"><a href="login.php">Ingresar</a></div>
<div id="op"><a href="register.html">Registrarse</a></div>

</div>

<center>
<div id="container">
<div id="title"><img src="logo_coockle.png"></div>
<div id=""> <input type="text" id="brecipe"><input type="button" value="Buscar Restaurantes"></div>
</div>
</center>
<div id="footer">
<a href="docs/index.html">Documentation</a>
</div>
</body>
</html>
