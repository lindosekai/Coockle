<?php
include("CoockAPI/coock.sqlbuilder.basic.php");
include("CoockAPI/coock.ingredients.php");
include("CoockAPI/coock.ingredients.gallery.php");

$sqlbuilder = new SQLBuilderBasic("ingredients_followers_group");
$galery = new IngredientsGalery();
$galery->setParameters(Array(
"ingredient_galery_title"=>"",
"ingredient_galery_description"=>"",
"id_user"=>1,
"ingredient_galery_date_creation"=>""
));
/// ----- POST SECTION ----///
$ingredient_name = $_GET["ingredient_name"];
$ingredient_description = $_GET["ingredient_description"];
$id_ingredient_type = $_GET["id_ingredient_type"];
/// ----- /POST SECTION ----///
$ingredient = new Ingredient();
$ingredient->setIdUser(1);
$ingredient->setIngredientName($ingredient_name);
$ingredient->setIngredientDescription($ingredient_description);
$ingredient->setIdIngredientType($id_ingredient_type);
$db = new Database();
$id_followers = $db->insert_id($sqlbuilder->insert(Array()));
$sqlbuilder->setTable("ingredient_image_gallery_group");
$id_galery = $db->insert_id($sqlbuilder->insert(Array()));
$sqlbuilder->setTable("ingredients_votes_group");
$id_votes = $db->insert_id($sqlbuilder->insert(Array()));
$sqlbuilder->setTable("ingredients_comments_groups");
$id_comment_group = $db->insert_id($sqlbuilder->insert(Array()));
$sqlbuilder->setTable("ingredients_qa");
$id_qa = $db->insert_id($sqlbuilder->insert(Array()));

$ingredient->setIdIngredientImageGaleryGroup($id_galery);
$ingredient->setIdIngredientFollowers($id_followers);
$ingredient->setIdIngredientVote($id_votes);
$ingredient->setIdIngredientCommentGroup($id_comment_group);
$ingredient->setIdIngredientQA($id_qa);

$sqlbuilder->setTable("ingredients");
$sql = $sqlbuilder->insert($ingredient->getParameters());
 $db->insert($sql);
?>
