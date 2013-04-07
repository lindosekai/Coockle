var eng = document.getElementById('eng');
var ang = 0;
function rotate(){
eng.style.Transform= "rotate("+ang+"deg)";
eng.style.webkitTransform= "rotate("+ang+"deg)";
ang +=10;
}
function animate(){
setInterval(function(){ rotate(); }, 100);
rotate();
}
animate();
