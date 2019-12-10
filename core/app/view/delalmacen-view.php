<?php
//ini_set("display_errors", 1);
$almacen = Almacendata::getById($_GET["id"]);

$products = ProductData::getAllByAlmacenId($_GET["id"]);
foreach ($products as $product) {
	$product->del_almacen();
}

$almacen->del();
Core::redir("./index.php?view=almacenes");


?>