<?php

$category = Categorydata::getById($_GET["id"]);

$products = ProductData::getAllByCategoryId($_GET["id"]);
foreach ($products as $product) {
	$product->del_category();
	$product->del_subcategory();
}

$category->del();
Core::redir("./index.php?view=categories");


?>