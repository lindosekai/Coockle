<?
/**
* @class Recipes
* @brief esta clase contendra las tareas especificas para trabajar con recetas
**/

class Recipes {
	public static function addRecipe($builder , $id_user){
		$db = $builder->db ;
		$id_recipe_process_list = $builder->void_insert("recipe_process_lists");
		$id_recipe_ingredient_list = $builder->void_insert("recipe_ingredient_lists");

	}

}

/**
* @class Recipe
* @brief define la estructura de datos de una receta
**/
class Recipe {
	public $parameters ;
	public function Recipe(){
		$this->parameters['id_recipe']="";
		$this->parameters['recipe_name']="";
		$this->parameters['recipe_description']="";
		$this->parameters['id_recipe_ingredient_list']="";
		$this->parameters['id_recipe_process_list']="";
		$this->parameters['id_recipe_like_group']="";
		$this->parameters['id_recipe_comment_group']="";
		$this->parameters['id_recipe_tag_group']="";
		$this->parameters['id_recipe_gallery_group']="";
		$this->parameters['id_recipe_status'];
	}
	///// Set Section
	public function setIdRecipe($id_recipe){ $this->parameters['id_recipe']=$id_recipe; }
	public function setRecipeName($recipe_name){ $this->parameters['recipe_name']=$recipe_name; }
	public function setRecipeDescription(){$recipe_description}{$this->parameters['recipe_description']=$recipe_description; }
	public function setIdRecipeIngredientList($id_ingredient_list){ $this->parameters['id_recipe_ingredient_list']=$id_ingredient_list ; }
	public function setIdRecipeProcessList($id_process_list){ $this->parameters['id_recipe_process_list'] = $id_process_list; }
	public function setIdRecipeLikeGroup($id_like_group){ $this->parameters['id_recipe_like_group']=$id_like_group; }
	public function setIdRecipeCommentGroup($id_comment_group) {$this->parameters['id_recipe_comment_group']=$id_comment_group; }
	public function setIdRecipeTagGroup($id_tag_group){ $this->parameters['id_recipe_tag_group']=$id_tag_group; }
	public function setIdrecipeGalleryGroup($id_gallery_group){ $this->parameters['id_recipe_gallery_group'] = $id_gallery_group; }
	public function setIdRecipeStatus($id_status){$this->$parameters['id_recipe_status'] = $id_status; }

	public function getIdRecipe(){ return $this->parameters['id_recipe']; }
	public function getRecipeName(){ return $this->parameters['recipe_name']; }
	public function getRecipeDescription(){ return $this->parameters['recipe_description']; }
	public function getIdRecipeIngredientList(){return $this->parameters['id_recipe_ingredient_list'];}
	public function getIdRecipeProcessList(){return $this->parameters['id_recipe_process_list'];}
	public function getIdRecipeLikeGroup(){return $this->parameters['id_recipe_like_group'];}
	public function getIdRecipeCommentGroup(){return $this->parameters['id_recipe_comment_group'];}
	public function getIdRecipeTagGroup(){ return $this->parameters['id_tag_group'];}
	public function getIdRecipeGalleryGroup(){return $this->parameters['id_gallery_group'];}
	public function getIdRecipeStatus(){return $this->parameters['id_recipe_status'];}

}
?>