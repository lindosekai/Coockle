<?php
/**
 * @file coock.ingredients.php
 * Ingredients
 * @date 16 de febrero del 2013
 * @brief Este archivo es muy importante para el manejo de los ingredientes.
 * @author lindosekai
 */
 
 class Ingredients {
 	function Ingredients($sqlbuilder){
 		$this->database = new Database() ;
		$this->builder = $sqlbuilder ;
 	}
    function getIngredients(){
    	$sql = "select *,users.username,ingredient_types.ingredient_type_name from ingredients inner join (users) inner join (ingredient_types) where users.id_user=ingredients.id_user and ingredient_types.id_ingredient_type=ingredients.id_ingredient_type";
        $query = $this->database->query($sql);
        print "<div id='ingredients'>";
        while($r = $query->fetch_array()){
	        print "<div id='ingredient'>";
		    //print "<div id='ing_user'>$r[username]</div>";
	        print "<div id='ing_name'><a href='ingredient.php?id_ingredient=$r[id_ingredient]'>$r[ingredient_name]</a></div>";

	        /////////// obtain number of comments
	        $s = "select count(*) as total from ingredient_comment where id_ingredient_comments_group=$r[id_ingredient_comments_group]";
	        $con = $this->database->connect();
	        $que = $con->query($s);
	        $comments_total= $que->fetch_array()['total'];
			print "<ul id='ing'>";
			print "<li>$r[ingredient_type_name]</li>";
			print "<li><a href=''>Galerias</a></li>";
			print "<li><a href=''>Seguidores</a></li>";
			print "<li><a href=''>Comentarios($comments_total)</a></li>";
			print "<li><a href=''>Votos</a></li>";
			print "<li><a href=''>Menciones</a></li>";
			print "<li><a href=''>Preguntas</a></li>";
			print "<li><a href=''>Marcas</a></li>";
			print "</ul>";
			print "</div>";
		}
		print "</div>";
    }
function getIngredientById($id_ingredient){
	$sql = "select *,users.username,ingredient_types.ingredient_type_name from ingredients inner join (users) inner join (ingredient_types) where users.id_user=ingredients.id_user and ingredient_types.id_ingredient_type=ingredients.id_ingredient_type and ingredients.id_ingredient=$id_ingredient";
    $query = $this->database->query($sql);	
	$ingredient = new Ingredient();
    $ingredient->setIdIngredient($id_ingredient);
    while($r = $query->fetch_array()){
        $ingredient->setIdUser($r['id_user']);
		$ingredient->setIngredientName($r['ingredient_name']);
		$ingredient->setIngredientDescription($r['ingredient_description']);
		$ingredient->setIdIngredientType($r['id_ingredient_type']);
		$ingredient->setIdIngredientGalery($r['id_ingredient_image_galery_group']);
		$ingredient->setIdIngredientFollowers($r['id_ingredient_followers']);
		$ingredient->setIdIngredientVote($r['id_ingredient_vote']);
		$ingredient->setIdIngredientCommentGroup($r['id_ingredient_comments_group']);
		$ingredient->setIdIngredientQA($r['id_ingredient_qa']);
	    }
	return $ingredient;
	}	
	
	function addComment($id_ingredient, $id_user, $comment_text){
		$ingredient = $this->getIngredientById($id_ingredient);
		$time = time();
		$id_coms = $ingredient->getParameters()['id_ingredient_comments_group'];
		$sql = "insert into ingredient_comment (id_ingredient_comments_group,id_user,time,comment_text) value ($id_coms,$id_user,$time,'$comment_text')";
		$this->database->query($sql);
		print $sql;
	}
	
	function loadComments($id_ingredient){
	//	print $id_ingredient;
		$ingr = $this->getIngredientById($id_ingredient);
		$id_coms = $ingr->getParameters()['id_ingredient_comments_group'];
		$name = $ingr->getParameters()['id_ingredient_name'];
		$sql = "select * from ingredient_comment where id_ingredient_comments_group=$id_coms order by time desc";
		$query = $this->database->query($sql);
		 while($r = $query->fetch_array()){
		 	print "<div id='item_comment'>";
            $date = date('d M Y \a \l\a\s h:i:s',$r[time]);
            print "<div id='item_comment_text'>$r[comment_text]</div>";
            print "<div id='item_comment_date'>$date</div>";
            print "</div>";
		 }
}
	
 	function setDatabase($db) { $this->db = $db; }
	
 }
 
 class Ingredient {
 	/** Es un array que contiene la informacion del ingrediente **/
 	public $parameters;

 	function Ingredient(){	$this->parameters = ""; }
	function setIdIngredient($id_ingredient){$this->parameters["id_ingredient"] = $id_ingredient; }
	function setIdUser($id_user){ $this->parameters["id_user"] = $id_user; }
	function setIngredientName($name){ $this->parameters["ingredient_name"] = $name; }
	function setIngredientDescription($description){ $this->parameters["ingredient_description"] = $description; }
	function setIdIngredientType($id_type){	$this->parameters["id_ingredient_type"] = $id_type; }
	function setIdIngredientImageGaleryGroup($id_galery){	$this->parameters["id_ingredient_image_gallery_group"] = $id_galery; }
	function setIdIngredientFollowers($id_followers){	$this->parameters["id_ingredient_followers"] = $id_followers; }
	function setIdIngredientVote($id_vote){	$this->parameters["id_ingredient_vote_group"] = $id_vote; }
	function setIdIngredientCommentGroup($id_comment_group){	$this->parameters["id_ingredient_comments_group"] = $id_comment_group; }
	function setIdIngredientQA($id_qa){ $this->parameters["id_ingredient_qa"] = $id_qa; }
	
	/// --- LOAD section
	/// --- GET section
    function getSQLNumComments(){ return "select count(*) as total from ingredient_comment where id_ingredient_comments_group=$this->getIdIngredientCommentsGroup"; }
	function getParameters(){ return $this->parameters; }
    function getIdIngredientCommentsGroup(){ return $this->parameters['id_ingredient_comments_group']; }
 };


?>
