var recipe_title = document.getElementById('recipe_title');
var r_title = document.getElementById('r_title');

r_title.addEventListener('blur', function(){ 
var txt = this.value;
if(txt.length>10){
recipe_title.innerHTML = txt;
}

 })
