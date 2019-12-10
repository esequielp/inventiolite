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
  $product->subcategory_id=$_POST["subcategory_id"];
  $product->almacen_id=$_POST["almacen_id"];

  $product->inventary_min=$inventary_min;
  $product->is_bsf = $_POST["is_bsf"];
  $product->user_id = $_SESSION["user_id"];

  $targetDir = "storage/products/";
  $allowTypes = array('jpg','png','jpeg','gif');

 if(isset($_FILES["images"])){


    if(!empty(array_filter($_FILES['images']['name']))){
        foreach($_FILES['images']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['images']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["images"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    //$insertValuesSQL .= "('".$fileName."', NOW()),";
                  echo "SI SUBIO";
                }else{
                    $errorUpload .= $_FILES['images']['name'][$key].', ';
                     echo "NO SUBIO" . $errorUpload ;
                }
            }else{
                $errorUploadType .= $_FILES['images']['name'][$key].', ';
            }
        }
      }
//echo $errorUploadType;
//exit;

foreach($_FILES['images']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['images']['name'][$key]);

            $idproduct = 3;
            echo  $fileName ."<br>";
            move_uploaded_file($fileName, "storage/products/");
            
            $product->add_images_product($fileName,  $idproduct);


}


    $image = new Upload($_FILES["images"]);
          if($image->uploaded){
            $image->Process("storage/products/");
                if($image->processed){
                  $product->image = $image->file_dst_name;
                  $prod = $product->add_with_image();
                }else{
                   $prod= $product->add();
                } 
          }else{
            $prod= $product->add();
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

//print "<script>window.location='index.php?view=products';</script>";


}


?>