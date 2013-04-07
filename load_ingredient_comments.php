<?php
include("CoockAPI/coock.sqlbuilder.basic.php");
include("CoockAPI/coock.ingredients.php");
include("CoockAPI/coock.ingredients.gallery.php");
$id_ingredient = $_GET['id_ingredient'];

$builder = new SQLBuilderBasic("ingredients");
$ingredients = new Ingredients($builder);
$id_ingredient = $_GET['id_ingredient'];

$ingredients->loadComments($id_ingredient);
?>