
var cnt = document.getElementById("cnt");
var ing = document.getElementById("ing");
ing.addEventListener("click",function(){ ingredients(); });

function initialize(){
 cnt = document.getElementById("cnt");
 ing = document.getElementById("ing");
ing.addEventListener("click",function(){ ingredients(); });
}

function menux(){
var menu = "<ul id='optx2'>";
menu += "<li id='ing'><span>Ingredientes</span></li>";
menu += "<li><span>Tipos de ingredients</span></li>";
menu += "<li><span>Galerias</span></li>";
menu += "<li><span>Seguidores</span></li>";
menu += "<li><span>Comentarios</span></li>";
menu += "</ul>";
cnt.innerHTML =  menu;
initialize();
}

function ingredients(){
var menu = "<li><a href='view_ingredients.php'>Ver Ingredientes</a></li>";
menu += "<li><a href='add_ingredient.php'>Agregar Ingrediente</a></li>";
menu += "<li><a href='add_ingredients_types.php'>Agregar tipo de Ingrediente</a></li>";
menu += "<li><a href='explore_ingredients.php'>Explorar Ingredientes</a></li>";
menu += "<li id='back'>Regresar</li>";
cnt.innerHTML = "<ul id='optx2'>" + menu + "</ul>";
document.getElementById('back').onclick = function(){ menux(); }
}
