<?php
$tips = simplexml_load_string(Tips::getMyTips());
print "<div id='tips'>";

foreach($tips->tip as $tip){
	print "<div id='tip'>";
	print "<div id='tip_body'>";
	if($tip->tip_imurl!=""){
		print "<div id='tip_imurl'><a href='".$tip->tip_imurl."'><img src='".$tip->tip_imurl."' style='width : 100% ;' class='tooo'></a></div>";		
	}
	print "<div id='tip_title'><a href='viewtip.php?id_tip=".$tip['id']."'>".$tip->tip_title."</a></div>";
	print "</div>";
	print "<div id='tip_foot'>";
print <<<AAA
<table>
<tr>
<td><img src='icons2/comment.png' style="width : 20px ;"></td>
<td style='width : 60% ;'><div class="g-plus" data-action="share" data-annotation="bubble" data-height="15"></div></td>
<td><a href="https://twitter.com/share" class="twitter-share-button" data-text="$tip->tip_title" data-url="http://coockle.com/viewtip.php?id_tip=$tip[id]" data-hashtags="coockle" data-lang="es">Tweet</a></td>
</tr>
</table>
AAA;

//	print "<div id='cms'>0 comments</div>";
	print "</div>";
	print "</div>";
}
print "</div><div style='clear : both;'></div><br>";
?>