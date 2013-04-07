<?php
/**
* @file components.php
* 20 de febrero del 2013
* @brief Este archivo aloja diferentes componentes de las paginas de Coockle
* como el menu principal, el footer....
*/

/**
* @fn topmenu
* @brief contiene la estructura del menu superior en una pagina de Coockle
**/
function topmenu(){
print <<<MEN
    <div id="topbar">
    <div class="opt" id="home">Inicio</div>
    <div class="opt" id="news">Personas</div>
    <div class="opt" id="nots">Notificaciones</div>
    <div class="opt" id="exit">Salir</div>
    <div id="tit">Coockle</div>
    </div>
    </div>
MEN;
}

function indexmenu(){
print <<<MEN
    <div id="topbar">
    <div id="tit">Coockle</div>
    </div>
    </div>
MEN;
}


/**
* @fn footer
* @brief contiene la estructura del footer en una pagina de Coockle
**/

function footer(){
print <<<FOO
<br><br><br><br><br><br><br><br>
<div id="footer"><br>NeopathIC &copy; 2013 Todos los Derechos Reservados<br><br>
<ul>
<li><a href="">Terminos de Uso</a></li>
<li><a href="">Politicas de Privacidad</a></li>
<li><a href="">Developers API</a></li>
<li><a href="">Pricing</a></li>
</ul>
<br><br><br>
FOO;
}
?>
