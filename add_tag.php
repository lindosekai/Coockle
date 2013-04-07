<?
$id_user = $_COOKIE['id_user'];
$tag_type = $_POST['tag_type'];
$id_tip = $_POST['id_tip'];
$tip_tag = $_POST['tip_tag'];
$id_tip_tag_group = $_POST['id_tip_tag_group'];

if($tag_type!=""&&$id_tip!=""&&$tip_tag!="" && $id_tip_tag_group!="" && $id_user!=""){
	print "tagging a tip!";

	include "CoockAPI/coock.tips.php";
	$builder = new SQLBuilderBasic("tip_tag");
	$params = Array(
		"tagger"=>$id_user,
		"tip_tag_time"=>time(),
		"tip_tag"=>$tip_tag,
		"id_tip_tag_group"=>$id_tip_tag_group
		);
	$builder->db->insert($builder->insert($params));
	print "<script>window.location='viewtip.php?id_tip=$id_tip';</script>";
}
?>