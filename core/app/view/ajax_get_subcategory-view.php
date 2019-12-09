<?php 
ini_set("display_errors", 0);
include(dirname(__FILE__)."../../../controller/Core.php");
include(dirname(__FILE__)."../../../controller/Model.php");
include(dirname(__FILE__)."../../../controller/Database.php");
include(dirname(__FILE__)."../../../controller/Executor.php");
include(dirname(__FILE__)."../../../app/model/SubCategoryData.php");

$data = array();
$subcategories = SubCategoryData::getSubcategoryAll($_GET["id"]);

foreach($subcategories as $subcategory){
   $data[] = array("id"=>$subcategory->id, "text"=>$subcategory->name);

 }

header('Content-type: application/json; charset=utf-8');
echo json_encode($data);

?>
