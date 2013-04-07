<?php

include("CoockAPI/coock.sqlbuilder.basic.php");

$ingredient_type_name = $_POST['ingredient_type_name'];
$ingredient_type_descripcion = $_POST['ingredient_type_description'];


if($ingredient_type_name || $ingredient_type_descripcion){
$sb = new SQLBuilderBasic("ingredient_types");

$db = new Database();
$con = $db->connect();
//print "-0-00";
$con->query($sb->insert([
"ingredient_type_name"=> $ingredient_type_name,
"ingredient_type_description" => $ingredient_type_descripcion]));
// }

//$db = new
}else {
print "Datos Vacios";
}

?>

