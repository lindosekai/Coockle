<?php
include "coock.tips.php";
$tip = Tips::getTipById(3);
$tc = new TipComment($tip);

?>


