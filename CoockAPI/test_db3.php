<?php

$user = Array(
"user-a"=>Array(
     "username"=>"usuario1",
     "password"=>sha1(md5("loquesea")),
     "status" =>1
),
"user-b"=>Array(
     "username"=>"usuario2",
     "password"=>sha1(md5("loquesea2")),
     "status" =>1
),
"user-c"=>Array(
     "username"=>"usuarioc",
     "password"=>sha1(md5("loquesea2")),
     "status" =>1
),
"user-d"=>Array(
     "username"=>"usuariod",
     "password"=>sha1(md5("loquesea2")),
     "status" =>1
),"user-e"=>Array(
     "username"=>"usuarioe",
     "password"=>sha1(md5("loquesea2")),
     "status" =>1
)
);
//print $user[0]["username"];
foreach($user as $clave => $valor){
print "$clave $valor[username] - $valor[password] - $valor[status]\n";
}
?>
