<?

$type = $_GET['ftype'];
$idf = $_GET['nxtflwr'];

if($type == 'user' && $idf!=""){
	include "CoockAPI/coock.sqlbuilder.basic.php";
	include "CoockAPI/coock.users.followers.php";
	$id_user = $_COOKIE['id_user'];
	print $id_user;
	UsersFollowers::$my_id = $id_user;
//	UsersFollowers::addFollower($idf);
//	print "<script>window.location='people.php';</script>";
//	header("Location : people.php");
}
?>