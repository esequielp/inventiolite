<?php

if(count($_POST)>0){
	$product = ProductData::getById($_POST["product_id"]);
	$idproduct = $_POST["product_id"];
	$product->barcode = strtoupper($_POST["barcode"]);
	$product->name = strtoupper($_POST["name"]);
	$product->description = $_POST["description"];
	$product->attribute = strtoupper($_POST["attribute"]);
	$product->price_in = $_POST["price_in"];
	$product->price_out = $_POST["price_out"];
	$product->price_out_bs = $_POST["price_out_bs"];
	$product->gain_dl = $_POST["gain_dl"];
	$product->gain_bs = $_POST["gain_bs"];
	$product->percentage = $_POST["percentage"];
	$product->unit = $_POST["unit"];
	$product->presentation = $_POST["presentation"];
	$product->inventary_min = $_POST["inventary_min"];
	$product->inventary_min = $_POST["images_id"];
	
	
	$category_id="NULL";
  
	if($_POST["category_id"]!=""){ $category_id=$_POST["category_id"];}

	//SI TIENE IMAGENES PARA ELIMINAR ELIMINO
	if($_POST["images_id"]!=""){ 
	
		$id_imagenes =$_POST["images_id"];
		
		$imagarray = explode("-",$id_imagenes);

		$idimagenes = "(";
		foreach ($imagarray as $key => $value) {
			//echo "<br>" . $value ."<br>";
			$idimagenes .= $value .",";
		}
		$idimagenes = substr($idimagenes, 0, -2);
		$idimagenes = $idimagenes . ")";
		//busco las url de las imagenes 
		$url_images = ProductData::getUrlImages($idimagenes);
		//busco el nombre de la primera imagen
		$imgppal = ProductData::getImagePrincipal($idproduct);
		$nombrefoto = $imgppal[0]->image;

		//borro los registros
		$product->delImages($idimagenes);
		
		//borro las imagenes
		foreach ($url_images as $url_image ) {

			if ($nombrefoto == $url_image->image_name) {
				# code...
				$sql = "SELECT COUNT(id) AS total FROM images WHERE id_product=2037";
				$query = Executor::doit($sql);
				$total =  Model::many($query[0],new ProductData());
				$cantidad = $total[0]->total;
				unlink('storage/products/'.$url_image->image_name);
				if ($cantidad == 0) {
					# code...
					$sql = "update product set image ='no_image.png' where id=$idproduct";
					Executor::doit($sql);
				}else{
					$sql = "SELECT image_name as img_name FROM images WHERE id_product = $idproduct ORDER BY id DESC LIMIT 1";
					$query = Executor::doit($sql);
					$nueva_ppal_image = Model::many($query[0],new ProductData());
					$sql_upd = "update product set image ='".$nueva_ppal_image[0]->img_name."' where id=$idproduct";
					Executor::doit($sql_upd);
				}
			}
			# code...
			unlink('storage/products/'.$url_image->image_name);
		}

	}

	$is_active=0;
	if(isset($_POST["is_active"])){ $is_active=1;}

	if($_POST["is_bsf"]=='on'){ 
		$is_bsf=1;
	}else{
		$is_bsf=0;
	}  
  $product->is_bsf =$is_bsf;
  $product->is_active=$is_active;
  $product->category_id=$category_id;

	$product->user_id = $_SESSION["user_id"];
	$product->update();

 if($_FILES['images']["name"][0] !=NULL ) {

      $files = array();
      foreach ($_FILES['images'] as $k => $l) {
        foreach ($l as $i => $v) {
        if (!array_key_exists($i, $files))
          $files[$i] = array();
          $files[$i][$k] = $v;
        }
      }
      $inserted_product = $product->update();
      $idproduct = $_POST["product_id"];

      foreach ($files as $file) {
        $handle = new Upload($file);

        if ($handle->file_is_image) {
            
                if ($handle->uploaded) {
                  $handle->image_resize = true;
                  $handle->image_y = 500;
                  $handle->image_x = 350;
                  $handle->image_ratio_y = true;
                  $handle->image_ratio_x= true;
                  $handle->file_overwrite =true;
                  $handle->Process("storage/products/");
                      if ($handle->processed) {
                        //echo 'OK';
                        //echo $handle->file_src_name;
                      $product->image = $handle->file_src_name;
                      $fileName = $handle->file_src_name;
                      $product->add_images_product($fileName , $idproduct);

                      } else {
                        echo 'Error: ' . $handle->error;
                      }
                } else {
                  echo 'Error: ' . $handle->error;
                }
        }else{
          unset($handle);
          $prod= $product->update();
        }
     }
 }else{
   $prod= $product->update();
 }  

	

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=editproduct&id=$_POST[product_id]';</script>";


}


?>