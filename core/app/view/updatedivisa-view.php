<?php

if(count($_POST)>0){
	$divisa = DivisaData::getById($_POST["divisa_id"]);
	$monto2=str_replace(",", ".",$_POST["monto"]);
	$divisa->monto = $monto2;
	$divisa->fuente = $_POST["fuente"];
	$divisa->update();
print "<script>window.location='index.php?view=divisas';</script>";


}


?>