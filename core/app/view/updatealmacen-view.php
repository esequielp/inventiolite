<?php

if(count($_POST)>0){
	$user = AlmacenData::getById($_POST["user_id"]);
	$user->name = strtoupper($_POST["name"]);
	$user->description = strtoupper($_POST["description"]);
	$user->update();
print "<script>window.location='index.php?view=almacenes';</script>";


}


?>