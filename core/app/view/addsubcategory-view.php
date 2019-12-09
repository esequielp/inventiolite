<?php

if(count($_POST)>0){
	$user = new SubCategoryData();
	$user->name = strtoupper($_POST["name"]);
	$user->category_id = $_POST["category_id"];
	$user->add();

print "<script>window.location='index.php?view=subcategories&id=$user->category_id';</script>";


}


?>