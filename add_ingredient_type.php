<html>
<head>
	<link rel="stylesheet" type="text/css" href="forms.basic.css">
</head>

<body>
<h2>Agregar Tipo de Ingredients</h2>
<hr>
<a href="docs/resources.html">Ir a Recursos</a>
<div id="theform">
<form method="post" action="process_ingredient.php">
<table>
<tr>
<td>Titulo : </td>
<td><input type="text" name="ingredient_type_name"></td>
</tr>

<tr>
<td>Descripcion : </td>
<td><textarea name="ingredient_type_description"></textarea></td>
</tr>

<tr>
<td></td>
<td><input type="submit" value="Agregar Tipo de Ingrediente"></td>
</tr>
</table>
</form>
</div>
</body>
</html>
