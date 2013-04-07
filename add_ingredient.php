<html>
<head>
			<script src="/jquery.min.js"></script>
	<style>
	* { margin : 0px ;padding : 0px;}
		input[type="text"],textarea {
		border : 1px rgba(255,255,255,0.5) solid ;
		padding : 5px ;
		width : 300px ;
		font-weight : bold ;
		font-size : 16px ;
		background : rgba(255,255,255,0.5);
		}
		input[type="submit"]{
			padding : 5px ;
			width : 300px ;
			font-weight : bold ;
			font-size : 16px ;
		}
		textarea {
			height : 200px ;
		}
		body { background : #fff ;}
		#all {
			background : #735C2F /* #876A3A */;
			width : 80% ;
			margin-left : 10% ;
			padding : 10px ;
		}
        hr { border : 1px white solid; height : 0px;}
        h3 { color : #fff ; } 
		div#lpart { width : 50% ; float : left ;}
		div#rpart  { width : 40% ; float : right ; margin-right : 10%;"}
        div#title { font-size : 38px; color : white ; font-weight : bold ; letter-spacing : 15px ;	}
	</style>
</head>
<body>
<section id="all">
	<div id="title">Coockle</div>
<br>
<h3>Agregar Ingrediente</h3>
<hr>
<br><br><br>
<div id="lpart">
<form method="post" name="data" action="process_real_ingredient.php" enctype="multipart/form-data" id="ingredient">
<table>
<tr>
<td>Nombre del Ingrediente : </td>
<td><input type="text" name="ingredient_name" id="ingredient_name"></td>
</tr>
<tr>
<td>Descripcion del Ingrediente : </td>
<td><textarea name="ingredient_description" id="ingredient_description"></textarea></td>
</tr>
<tr>
<td>Tipo de Ingrediente : </td>
<td><input type="text" name="id_ingredient_type" id="id_ingredient_type"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Agregar Ingrediente" id="save"></td>
</tr>
</table>
</form>
<br><br><br>
<br><br><br>
<br><br><br>
</div>

<div id="rpart">
<table>	
	<tr>
<td>Imagen : </td>
<td><img src="" id="imgsrc" style="width = 250px ; height : 250px ;"></td>
</tr>

<tr>
<td></td>
<td><input type="file" name="ingredient_image" id="ingredient_image"></td>
</tr>
</table>
</div>
<div style="clear: both"></div>
<script>
	var img = document.getElementById("imgsrc");

    document.getElementById("ingredient_image").addEventListener("change",function(e){
	var file = this.files[0];
	var data = new FormData();
	data.append("file1",file);
	
	var xhr = new XMLHttpRequest();
	xhr.open("post" , "process_ingredient_img.php" , true);
	xhr.onreadystatechange = function(e){
		if(this.readyState==4){
			
			img.src = "ingredients_imgs/" + this.responseText;
			//console.log("Listo!!");
		}else {
			console.log("cargando ...");
		}
	}
	xhr.send(data);
});
	var save = document.getElementById("save");
	save.addEventListener("click", function(e){
		e.preventDefault();
		if(document.data.ingredient_name.value !="" && document.data.ingredient_description.value !="" && document.data.id_ingredient_type.value!="")
		{ 
			var data = $("form#ingredient").serialize();
			var xhr = new XMLHttpRequest();
			xhr.open("get","process_real_ingredient.php?"+data,true);
			xhr.send();
			document.data.ingredient_name.value ="";
			document.data.ingredient_description.value ="";
			document.data.id_ingredient_type.value ="";   
		}
});
    
</script>
</section>
</body>
</html>
