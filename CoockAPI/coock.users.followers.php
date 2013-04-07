<?php
/**
* @file coock.users.followers.php
* @brief Aloja las funciones para agregar, manipular seguidores de usuarios
* @author lindosekai
* @date 1 March 2013
**/

class UsersFollowers {
	public static $my_id;
	public static function addFollower($id_mf){
		$builder = new SQLBuilderBasic("user_followers");
		$db = $builder->db;
		$param = Array(
		"user"=>self::$my_id,
		"follower"=>$id_mf
		);

		$sql = $builder->insert($param);
		print $sql;
		$db->insert($sql);
//		print "<script>window.location='people.php';</dscript>";
	}

	public static function getFollowing(){
		$builder = new SQLBuilderBasic("user_followers");
		$sql = "select user_followers.follower,profile.name as name,profile.last_name as lname from user_followers inner join profile on(follower=profile.id_user) where user=".self::$my_id;
		$query = $builder->db->query($sql);
		$result = "<followers>\n";
		while($rs=$query->fetch_array()){
			$result .= "<follower id='$rs[follower]'>\n";
			$result .= "<flwrname>$rs[name]</flwrname>\n";
			$result .= "<flwrlname>$rs[lname]</flwrlname>\n";
			$result .= "</follower>\n";
		}
		$result .= "</followers>\n";
		return $result;
	}

}
?>