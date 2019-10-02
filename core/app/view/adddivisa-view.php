<?php
//ini_set("display_errors", 1);
if(count($_POST)>0){
	$divisa = new DivisaData();
	$divisa->monto = $_POST["monto"];
	$divisa->fuente = $_POST["fuente"];
	$divisa->add();

print "<script>window.location='index.php?view=divisas';</script>";


}


?>