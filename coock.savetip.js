    var addtip = document.addtip;
	var title = document.addtip.tip_title;
	var descr = document.addtip.tip_description;
	var tippr = document.addtip.tippr ;
	var pic = document.addtip.pic ;
    descr.style.height = '150px';
		title.placeholder= "Escribe un Titulo para tu Tip";	
addtip.addEventListener("submit",function(e){
	if(title.value=="" || descr.value==""){
  	    e.preventDefault();
  	    alert("No debe haber datos vacios");
    }
});
/*
	descr.style.webkitTransition = "height 0.3s linear";
	descr.style.borderTop = "1px black solid ";
	title.style.border = "1px white solid";
	tippr.style.display = "none";
	pic.style.display = "none";
	descr.style.height = "30px";
	title.placeholder= "Escribe un Nuevo Tip";

	descr.addEventListener("focus",function(){
		descr.style.borderTop = "1px white solid ";
		title.style.border = "1px black solid";
		title.placeholder= "Escribe un Titulo para tu Tip";		
		descr.style.height = "90px";
		tippr.style.display="block";
	});

	descr.addEventListener("blur",function(){
		console.log(title.value.length);
		if(descr.value.length<=0){
		descr.style.borderTop = "1px black solid ";
	descr.style.height = "30px";
		title.style.border = "1px white solid";
		title.placeholder= "";	
		tippr.style.display="none";
	}else {
		pic.style.display = "block";
	}	
	});
*/
