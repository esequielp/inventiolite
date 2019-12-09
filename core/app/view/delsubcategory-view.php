<?php

$subcategory = SubCategorydata::getById($_GET["id"]);

$products = ProductData::getAllBySubCategoryId($subcategory->id);

 foreach ($products as $product) {
 	$product->del_subcategory();
 }

$subcategory->del();
Core::redir("./index.php?view=subcategories&id=".$subcategory->category_id);


?>