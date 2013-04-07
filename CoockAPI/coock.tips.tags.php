<?
class TipTags {
	public static $id_tip_tag_group;
	public static $builder;
	public static function getTipTags(){
		$reslut ="";
		if(self::$builder!="" && self::$id_tip_tag_group!=""){
			$db = self::$builder->db;
			$sql = "select tip_tag,count(*) as num_tag from tip_tag where id_tip_tag_group=".self::$id_tip_tag_group." group by tip_tag";
			$query = $db->query($sql);
			$result = "<tip_tags>";
			while($r=$query->fetch_array()){
				$result .="<tip_tag>";
				$result .= "<tag>".$r['tip_tag']."</tag>";
				$result .= "<num_tags>".$r['num_tag']."</num_tags>o";
				$result .="</tip_tag>";
			}
			$result .= "</tip_tags>";
		}else if($builder==""){
			print "SQLBuilder Error";
		}
		return $result;
	}
}
?>