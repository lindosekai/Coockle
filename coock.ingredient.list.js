var ingredient_list = document.querySelector("ol#ingredient_list");
var ingredient1 = document.querySelector("li input[type=text]#ingredient1");
ingredient1.edited = false;

var ing_counter = 2;

function addIngredient(){
    var ingredient_item = document.createElement('li');
    var ingredient_item_text = document.createElement('input');
    ingredient_item_text.edited = false ;
    ingredient_item_text.placeholder = "Escribe Ingrediente";
    ingredient_item_text.type= 'text';
    ingredient_item_text.id = "ingredient"+ing_counter;
    ingredient_item.appendChild(ingredient_item_text);
    ingredient_item_text.addEventListener("blur",function(){
    var txt = this.value;
	if(txt.length>4 && this.readOnly==false && this.edited==false){
    addIngredient(); 
////////
if(this.parentElement.childElementCount<2){
    var editr = document.createElement("span");
    editr.id = "editr-" + ing_counter;
    editr.innerHTML = "editar";
    console.log(this);
    editr.onclick = function(){ 
        var edtbx = this.parentElement.childNodes[0];
        console.log(edtbx.style.border);
        edtbx.style.border = '1px black solid';
        edtbx.readOnly = false;
    }
    this.parentElement.appendChild(editr);
}
////////
    this.edited = true; 
    this.readOnly = true; 
    this.style.border = '1px white solid';
}else { this.style.border='1px white solid';this.readOnly=true;  }
     });
    var spn = document.createElement("span");
    spn.appendChild(ingredient_item);
    ingredient_list.appendChild(spn);
    ing_counter++;
}




ingredient1.onblur = function(e){ 
var txt = ingredient1.value;
if(txt.length>4 && ingredient1.readOnly==false && ingredient1.edited==false){ 
addIngredient(); 
ingredient1.readOnly = true; 
ingredient1.edited= true;
ingredient1.style.border = '1px white solid';
if(ingredient1.parentElement.childElementCount<2){
    var editr = document.createElement("span");
    editr.id = "editr-" + ing_counter;
    editr.innerHTML = "editar";
    editr.onclick = function(){ 
        var edtbx = this.parentElement.childNodes[0];
        console.log(edtbx.style.border);
        edtbx.style.border = '1px black solid';
        edtbx.readOnly = false;
    }
    this.parentElement.appendChild(editr);
}
 }else { ingredient1.style.border='1px white solid';ingredient1.readOnly=true; }

}
