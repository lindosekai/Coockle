<?
/**
* @file coock.tips.php
* @brief Contiene las estructuras de datos y metodos para manejar, administrar y actualizar tips.
* @date 27 February 2013
* @author lindosekai
**/
include "coock.sqlbuilder.basic.php";
/**
* @class Tips
* @brief Contiene las funciones para buscar, agregar, etc tips
* varias de sus funciones devuelven como tipo de dato un objeto de tipo Tip
**/

class Tips {
	/** 
	* El author en el contexto static 
	* En este caso el que escribe los tips
	**/
	public static $author = ""; 
	/**
	* El tiempo de creacion del tip
	* De caracte int, se obtiene al ejecutar la funcion time()
	**/
	public static $tip_time = "";
	public static $tip_title = "";
	public static $tip_description ="";
	public static $tip_status = "";
	/**
	* @fn getTipById
	* @param id_tip el identificador del tip que queremos extraer
	* @brief Extrae de la base de datos el tip con $id_tip
	* @return Un objeto de tipo Tip
	**/
	public static function getTipById($id_tip){
		$sql = "select id_tip,tip_time,author,tip_title,tip_description,tips.id_tipig,tipig_item_url as image_url from tips left join tip_image_galery_item on (tips.id_tipig=tip_image_galery_item.id_tipig) where id_tip=$id_tip order by tip_time desc";
//		$sql = "select * from tips where id_tip=$id_tip";
		$builder = new SQLBuilderBasic("tips");
		$db = $builder->db;
		$query = $db->query($sql);
		$tip = new Tip();
		$tip->setIdTip($id_tip);
		while($r = $query->fetch_array()){
			$tip->setTipTitle($r['tip_title']);
			$tip->setTipDescription($r['tip_description']);
			$tip->setIdTipTagGroup($r['id_tip_tag_group']);
			$tip->setIdTipig($r['id_tipig']);
			$tip->setIdTipCommentGroup($r['id_tip_comment_group']);
			$tip->setIdTipYummiGroup($r['id_tip_yummi_group']);
			$tip->setTipStatus($r['tip_status']);
			$tip->image_url = $r['image_url'];
		}
		print $tip->getIdTipCommentGroup();
		return $tip;
	}

	/**
	* @fn createTip
	* @brief crear integramente un tip vacio
	**/
	public static function createTip(){
		$tip = new Tip();
		$builder = new SQLBuilderBasic("tips");
		$db = $builder->db;
		$tip->setTipTime(self::$tip_time);
		$tip->setAuthor(self::$author);
		$tip->setTipTitle(self::$tip_title);
		$tip->setTipDescription(self::$tip_description);
		$tip->setIdTipTagGroup($db->insert_id(SQLBuilderBasic::voidInsert("tip_tag_group")));
		$tip->setIdTipig($db->insert_id(SQLBuilderBasic::voidInsert("tipig")));
		$tip->setIdTipCommentGroup($db->insert_id(SQLBuilderBasic::voidInsert("tip_comment_group")));
		$tip->setIdTipYummiGroup($db->insert_id(SQLBuilderBasic::voidInsert("tip_yummi_group")));
		$tip->setTipStatus(self::$tip_status);
		$sql = $builder->insert($tip->getParameters());
		$tip->setIdTip($db->insert_id($sql));
		return $tip;
	}

	/**
	* @fn countMyTips
	* @brief devuelve el numero de tips que ha publicado el usuario
	**/
	public static function countMyTips(){
		$builder = new SQLBuilderBasic("tips");
		$db = $builder->db;
		$qry = $db->query($builder->count_where("author=".self::$author));
		$qr = $qry->fetch_array();
		return $qr[0];
	}
	/**
	* @fn getMyTips
	* @brief genera un la lista de los tips que pertenecena  un usuario
	**/
	public static function getMyTips(){
		$builder = new SQLBuilderBasic("tips");
		$db = $builder->db;
		$sql = "select id_tip,tip_time,author,tip_title,tip_description,tips.id_tipig,tipig_item_url as image_url from tips left join tip_image_galery_item on (tips.id_tipig=tip_image_galery_item.id_tipig) where author=".self::$author." order by tip_time desc";
		$qry = $db->query($sql);
		$result = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\n";
		$result .= "<tips>";
		while($rs = $qry->fetch_array()){	
		$result .= "<tip id='$rs[id_tip]'>\n";
			$result .= "<tip_time>".date('d-M-Y h:i:s',$rs['tip_time'])."</tip_time>\n";
			$result .= "<tip_author>".$rs['author']."</tip_author>\n";
			$result .= "<tip_title>".$rs['tip_title']."</tip_title>\n";
			$result .= "<tip_imurl>".$rs['image_url']."</tip_imurl>\n";
			$result .= "<tip_description>".$rs['tip_description']."</tip_description>\n";
			$result .= "</tip>\n";
		}

		$result .= "</tips>";
		return $result;
	}

	public static function searchForTips($data){
		$builder = new SQLBuilderBasic("tips");
		$db = $builder->db;
		$sql = "select id_tip,tip_time,author,tip_title,tip_description,tips.id_tipig,tipig_item_url as image_url from tips left join tip_image_galery_item on (tips.id_tipig=tip_image_galery_item.id_tipig) where tip_title like '%$data%' or tip_description like '%$data%' order by tip_time desc";

		$qry = $db->query($sql);
		$result = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\n";
		$result .= "<tips>";
		while($rs = $qry->fetch_array()){
			$result .= "<tip id='$rs[id_tip]'>\n";
			$result .= "<tip_time>".date('d-M-Y h:i:s',$rs['tip_time'])."</tip_time>\n";
			$result .= "<tip_author>".$rs['author']."</tip_author>\n";
			$result .= "<tip_title>".$rs['tip_title']."</tip_title>\n";
			$result .= "<tip_imurl>".$rs['image_url']."</tip_imurl>\n";
			$result .= "<tip_description>".$rs['tip_description']."</tip_description>\n";
			$result .= "</tip>\n";
		}

		$result .= "</tips>";
		return $result;
	}

}

/**
* @class Tip
* @brief Contiene la estructra de datos de un tip
* tambien tiene las propiedades para realizar acciones sobre un tip
* apartir de esta clase la explicacion la hare un poco mas extensa, dado que esta clase no la usare solo yo, si no 
* otros integrantes del equipo
**/

class Tip {
	/**
	* @fn Tip
	* @brief Es el contructor de la clase
	* Inicializa los valores para un tip entre los cuales se encuentran el array parameters el el builder correspondiente
	**/

	/**
	* corresponde a un array asociativo que almacenara cada atributo del tip en cuestion
	**/
	public $parameters;

	/** Corresponde a un objeto de tipo SQLBuilderBasic para manejar las tareas internas relacionadas con los tips **/
	public $builder;


	function Tip(){
		$this->parameters = null;
		$this->builder = new SQLBuilderBasic("tips");
	}

	/***** HERE START THE set section *****/

	/**
	* @fn setIdTip
	* @brief Asigna el id_tip apartir del parametro insertado
	* @param id_tip el futuro id_tip que se asignara al objeto Tip
	**/
	function setIdTip($id_tip){ $this->parameters['id_tip'] = $id_tip; }
	/**
	* @fn setTipTime
	* @brief asigna el tip_time apartir del parametro insertado, el valor debe ser obtenido
	* de la function time() de php para que pueda ser interpretado, este valor pertenece a la hora de creacion del tip
	* @param time numero entre obtenido de la funcion time() refleja la fecha de creacion del tip
	**/
	function setTipTime($time) { $this->parameters['tip_time'] = $time; }
	/**
	* @fn setAuthor
	* @brief Asigna el author del tip, normalmente es un identificador de usuarios valido
	* @param author el identificador del tip 
	**/
	function setAuthor($author) { $this->parameters['author'] = $author; }
	/**
	* @fn setTipTitle
	* @brief Asigna el titulo del tip al objeto apartir del parametro $tip_title
	* @param tip_title el titulo que se asignara al tip
	**/
	function setTipTitle($tip_title){ $this->parameters['tip_title'] = $tip_title; }
	/**
	* @fn setTipDescription
	* @param tip_description la descripcion que se le agregara al tip
	* @brief asigna la descripcion del tip, aparartir del parametro
	**/
	function setTipDescription($tip_description){ $this->parameters['tip_description'] = $tip_description; }
	/**
	* @fn setTipTagGroup
	* @brief Asigna el identificador del tip_tag_group apartir de este identificador se referencean los tags que tendra el tip
	* @param id_tip_tag_group el identificador tip_tag_group
	**/
	function setIdTipTagGroup($id_tip_tag_group){ $this->parameters['id_tip_tag_group'] = $id_tip_tag_group; }
	function setIdTipig($id_tipig){ $this->parameters['id_tipig'] = $id_tipig; }
	function setIdTipCommentGroup($id_tip_comment_group){ $this->parameters['id_tip_comment_group'] = $id_tip_comment_group; }
	function setIdTipYummiGroup($id_tip_yummi_group){ $this->parameters['id_tip_yummi_group'] = $id_tip_yummi_group; }
	function setTipStatus($tip_status) { $this->parameters['tip_status'] = $tip_status; }
	function setParameters($parameters){ $this->parameters = $parameters; }

	/***** HERE START THE get section *****/
	function getParameters(){ return $this->parameters; }
	function getIdTip(){ return $this->parameters['id_tip']; }
	function getTipTime(){ return $this->parameters['tip_time']; }
	function getAuthor(){ return $this->parameters['author']; }
	function getTipTitle(){ return $this->parameters['tip_title']; }
	function getTipDescription(){ return $this->parameters['tip_description']; }
	function getIdTipTagGroup(){ return $this->parameters['id_tip_tag_group']; }
	function getIdTipig(){ return $this->parameters['id_tipig']; }
	function getIdTipCommentGroup(){ return $this->parameters['id_tip_comment_group']; }
	function getIdTipYummiGroup(){ return $this->parameters['id_tip_yummi_group']; }
	function getTipStatus(){ return $this->parameters['tip_status']; }
	/***** HERE START THE build section *****/

	function buildTip(){
		return $this->builder->insert($this->getParameters());
	}
}

class TipComments {
	public function getTipComments(Tip $tip){

	}
}

class TipComment{
	function TipComment(Tip $tip){
		if($tip->getIdTip()==""){ print "id_tip not must be void"; return -1; }
		else if(!isset($tip->parameters['id_tip_comment_group'])){ print "void_tip"; return -1;}
		else if($tip->getIdTipCommentGroup()==""){ print "tip not exist"; return -1; }
		$id_tcg = $tip->getIdTipCommentGroup();
	}

//	public function TipComment(){
//		$this->parameters = "";
//	}
	public function setIdTipComment($id_tip_comment){ $this->parameters['id_tip_comment']=$id_tip_comment; }
	public function setTipCommentTime($tip_comment_time){$this->parameters['tip_comment_time']=$tip_comment_time;}
	public function setTipCommentAuthor($tip_comment_author){ $this->parameters['tip_comment_author']=$tip_comment_author;  }
	public function setTipCommentText($tip_comment_text) { $this->parameters['tip_comment_text']= $tip_comment_text; }
	public function setIdTipCommentGroup($tip_comment_group){ $this->parameters['id_tip_comment_group']=$tip_comment_group; }

	public function getIdTIpComment(){ return $this->parameters['id_tip_comment']; }
	public function getTipCommentTime(){return $this->parameters['tip_comment_time']; }
	public function getTipCommentAuthor(){return $this->parameters['tip_comment_author']; }
	public function getTipCommentText(){return $this->parameters['tip_comment_text']; }
	public function getIdTipCommentGroup(){return $this->parameters['id_tip_comment_group']; }
};

?>