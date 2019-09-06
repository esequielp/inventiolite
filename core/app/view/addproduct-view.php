<?php

if(count($_POST)>0){
  $product = new ProductData();
  $product->barcode = $_POST["barcode"];
  $product->name = $_POST["name"];
  $product->price_in = $_POST["price_in"];
  $product->percentage = $_POST["percentage"];
  $product->price_out = $_POST["price_out"];
  $product->unit = $_POST["unit"];
  $product->description = $_POST["description"];
  $product->presentation = $_POST["presentation"];
  //$product->inventary_min = $_POST["inventary_min"];
  $category_id="NULL";
  if($_POST["category_id"]!=""){ $category_id=$_POST["category_id"];}
  $inventary_min="\"\"";
  if($_POST["inventary_min"]!=""){ $inventary_min=$_POST["inventary_min"];}

  $product->category_id=$category_id;
  $product->inventary_min=$inventary_min;
  
 if($_POST["is_bsf"]=='on'){ 
    $is_bsf=1;
  }else{
    $is_bsf=0;
  }  
  $product->is_bsf =$is_bsf;
  $product->user_id = $_SESSION["user_id"];

 if(isset($_FILES["images"])){

      $files = array();
      foreach ($_FILES['images'] as $k => $l) {
        foreach ($l as $i => $v) {
        if (!array_key_exists($i, $files))
          $files[$i] = array();
          $files[$i][$k] = $v;
        }
      }
      $inserted_product = $product->add_with_image();
      $idproduct = $inserted_product[1];

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
                        echo 'OK';
                        echo $handle->file_src_name;
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
          $prod= $product->add();
        }
     }
 }else{
   $prod= $product->add();
 }    

 
if($_POST["q"]!="" || $_POST["q"]!="0"){
 $op = new OperationData();
 $op->product_id = $prod[1] ;
 $op->operation_type_id=OperationTypeData::getByName("entrada")->id;
 $op->q= $_POST["q"];
 $op->sell_id="NULL";
$op->is_oficial=1;
$op->add();
}

print "<script>window.location='index.php?view=products';</script>";


}


?>