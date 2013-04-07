<?
/* Coock Ingredients Galery
 * 15 de Febrero del 2013
 * Esta clase aloja las tareas relacionadas con las galerias de los ingredientes
 */
 
 class IngredientsGalery {
 	function IngredientsGalery(){
		$this->galery_title = "";
		$this->galery_description = "";
		$this->galery_date_creation="";
		$this->user = "";
		$this->parameters = Array();
		$parameter["ingredient_galery_date_creation"]="";
 	}
	
	function setGaleryTitle($title){ $this->galery_title=$title; $this->parameters["ingredient_galery_title"]=$title; }
	function setGaleryDescription($description){ $this->galery_description=$description;$this->parameters["ingredient_galery_description"]=$description;}
	function setUser($user){$this->user = $user; $this->parameters["id_user"]=$user;}
	function setGaleryDatecreation($date){ $this->galery_date_creation=$date; }
	
	function setParameters($parameter){
		$this->galery_title = $parameter["ingredient_galery_title"];
		$this->galery_description = $parameter["ingredient_galery_description"];
		$this->galery_date_creation = $parameter["ingredient_galery_date_creation"];
		$this->user = $parameter["id_user"];
		$this->parameters=$parameter;
		
	}
	
	function getGaleryTitle() {return $this->galery_title;}
	function getGaleryDescription(){return $this->galery_description;}
	function getUser(){  return $this->user;}
	function getGaleryDateCreation(){ return $this->galery_date_creation;}
    function getParameters() {return $this->parameters;}
	function create($sql){
		print $sql;
//		$this->database->insert($parameters);
	}
 };
?>