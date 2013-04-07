<?php
/**
* @file coock.profiles.php
* @brief contiene la clase profiles  y profile
**/

include "coock.sqlbuilder.basic.php";
class Profiles {

	public static function getNationalities(){
		$builder = new SQLBuilderBasic("nationalities");
		$db = $builder->db;

		$qry = $db->query($builder->select_all());
		$result = "<nationalities>\n";
		while($rs = $qry->fetch_array()){
			$result.= "<nationality id='".$rs['id_nationality']."'>".$rs['nationality']."</nationality>\n";
		}
		$result .= "</nationalities>\n";

		return simplexml_load_string($result);
	}

}

?>