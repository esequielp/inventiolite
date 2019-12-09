<?php

if(count($_POST)>0){
	$subcategory = SubCategoryData::getById($_POST["user_id"]);
	$subcategory->name = strtoupper($_POST["name"]);
	$subcategory->update();
print "<script>window.location='index.php?view=subcategories&id=$subcategory->category_id';</script>";


}


?>