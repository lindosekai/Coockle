<?php
$verduras = simplexml_load_file("verduras.xml");
//print_r($verduras);

//print $verduras->items->item[0]['otro']."\n";
//print $verduras->items->item[1]['name']."\n";

foreach($verduras->items->item as $k){
	print "$k[name]\n";
	foreach($k as $y){
		print "\t$y[name]\n";
	}
}

?>