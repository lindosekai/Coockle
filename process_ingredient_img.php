<?php
$rmethod = $_SERVER["REQUEST_METHOD"];
if($rmethod=="POST"){
	$file_temp = $_FILES["file1"]["tmp_name"];
	$file_fldr = "ingredients_imgs/";
	$file_name = $_FILES["file1"]["name"];
	if(is_uploaded_file($file_temp)){
		$dest =$file_fldr.$file_name ;
		if(move_uploaded_file($file_temp,$dest )){
			print "$file_name";
		}
	}
}
?>