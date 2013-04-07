<?php
include 'CoockAPI/coock.database.php';
include("CoockAPI/coock.sqlbuilder.basic.php");
include("CoockAPI/coock.ingredients.php");
include("CoockAPI/coock.ingredients.gallery.php");
$db = new Database();
$builder = new SQLBuilderBasic("ingredients");
$ingredients = new Ingredients($db,$builder);
$id_ingredient = $_GET['id_ingredient'];
$id_user = $_GET['id_user'];
$comment_text = $_GET['comment_text'];
$ingredients->addComment($id_ingredient, $id_user, $comment_text);
?>
