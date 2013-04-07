<?
$id_user = $_COOKIE['id_user'];
include_once "CoockAPI/coock.tips.php";

Tips::$author = $id_user;
Tips::$tip_time = time();
Tips::$tip_title = $_POST['tip_title'];
Tips::$tip_description =$_POST['tip_description'];
Tips::$tip_status = 1;
// print Tips::$author;
$tip = Tips::createTip();
//print $tip->getIdTip();

$rmethod = $_SERVER["REQUEST_METHOD"];
if($rmethod=="POST"){
	$file_temp = $_FILES["pic"]["tmp_name"];
	$file_fldr = "imgs/";
	$file_name = $_FILES["pic"]["name"];
	if(is_uploaded_file($file_temp)){
		$dest =$file_fldr.$file_name ;
		if(move_uploaded_file($file_temp,$dest )){
			$tipig = $tip->getIdTipig();
			print "-$file_name";
			if($file_name!=""){
			$builder = new SQLBuilderBasic("tipigic_group");
			$tipigicg = $builder->db->insert_id($builder->insert());
			$sql = "insert into tip_image_galery_item (tipig_item_title,tipig_item_description,tipig_item_url,id_tipig,id_tipigic_group) value ('$file_name','','$dest','$tipig','$tipigicg')";
			$builder->db->insert($sql);
           }
		}
	}
}

print "<script>window.location='home.php';</script>";



?>