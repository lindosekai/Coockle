<?
/**
* @file find_people.php
* @brief Devuelve la lista de personas buscadas
**/
include "CoockAPI/coock.tips.php";
include "CoockAPI/coock.users.php";
include "CoockAPI/coock.users.followers.php";
$data = $_GET['data'];

$xmldata = Users::showAll($data);
$users = simplexml_load_string($xmldata);
$me = $_COOKIE['id_user'];

// print_r($xmldata);
foreach($users->user as $user){
   Tips::$author = $user[id];
   $ntips = Tips::countMYTips();
   print <<<AAA
   <div id='user'>
   <div id='fullname'>$user->name $user->lastname</div>
   <div id='ntips'>$ntips Tips</div>
AAA;
print "</div>";
}
?>