var topbr = document.getElementById("topbar");
var home = document.getElementById("home");
var news = document.getElementById("news");
var nots = document.getElementById("nots");
var expl = document.getElementById("expl");
var exit = document.getElementById("exit");

var log = document.getElementById("log");
var reg = document.getElementById("reg");

function redirect(url){ window.location = url ;}

home.addEventListener("click",function(){ redirect("home.php");});
exit.addEventListener("click",function(){ redirect("logout.php");});
news.addEventListener("click",function(){ redirect("people.php");});
log.addEventListener("click",function(){ redirect("login.php");});
reg.addEventListener("click",function(){ redirect("register.php");});
