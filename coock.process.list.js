var process_list = document.querySelector("ol#process_list");
var ings = Array();
var process1 = document.querySelector("li textarea#process1");

var proc_counter = 2;

function addProcess(){
    var process_item = document.createElement('li');
    var process_item_text = document.createElement('textarea');
    process_item_text.placeholder = "Escribe Proceso";
//    console.log(process_item)
//    process_item_text.type= 'text';
    process_item_text.id = "process"+proc_counter;
    process_item.appendChild(process_item_text);
    process_item_text.addEventListener("blur",function(){ 
        var txt = this.value;
        if(txt.length>4 && this.readOnly==false){ addProcess(); this.readOnly = true; this.style.border = '1px white solid'; }
     });
    process_list.appendChild(process_item);
    ing_counter++;
}

process1.onblur = function(e){ 
var txt = process1.value;
if(txt.length>4 && process1.readOnly==false){ addProcess(); process1.readOnly = true; process1.style.border = '1px white solid'; }
}
