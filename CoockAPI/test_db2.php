<?php
$url = "http://127.0.0.1/coockle/CoockAPI/test_db.php";

$request = file_get_contents($url);
//$request = http_post_data($url, $data);
print $request;
?>