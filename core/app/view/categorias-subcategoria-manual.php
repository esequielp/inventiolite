<?php
$categorias= DivisaData::getAllCategorias();



//print_r($categorias);

//$nombre = $categorias[0]->CATEGORÍA;

$categoria = new DivisaData();

$subcategoria = new CategoryData();



foreach ($categorias as $category) {
	
	$idcat = $category->id;
	$nombre =$category->name; 

echo $idcat	. "- " . $nombre ."<br><br>" ;


	$subcategories = $categoria->getAllSubCategorias($nombre);


		foreach ($subcategories as $subcategory) {
			

			$nombresub =$subcategory->SUBCATEGORÍA; 
			
			$categoria->addSubCategoria($idcat,$nombresub);
			
			echo $idcat	. "- " . $nombresub ."<br><br>" ;

		}

	//echo $idcat	. "- " . $nombresub ."<br><br>" ;
	//$category->addCategoria();
	//$product->del_subcategory();
}



exit;
?>