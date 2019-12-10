<?php

if(count($_POST)>0){
  $user = new AlmacenData();
  $user->name = strtoupper($_POST["name"]);
  $user->description = strtoupper($_POST["description"]);
  $user->add();

print "<script>window.location='index.php?view=almacenes';</script>";


}


?>