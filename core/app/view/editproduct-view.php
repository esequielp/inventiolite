<?php
$product = ProductData::getById($_GET["id"]);
$categories = CategoryData::getAll();

if($product!=null):
?>
<div class="row">
	<div class="col-md-8">
	<h1><?php echo $product->name ?> <small>Editar Producto</small></h1>
  <?php if(isset($_COOKIE["prdupd"])):?>
    <p class="alert alert-info">La informacion del producto se ha actualizado exitosamente.</p>
  <?php setcookie("prdupd","",time()-18600); endif; ?>
	<br><br>
		<form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=updateproduct" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Imagen*</label>
     <input type="file" name="image" id="name" placeholder="">
  </div>

<div class="form-group">
         <label for="inputEmail1" class="col-lg-3 control-label">Imagenes*</label>
        <?php 
        $imagenes = ProductData::getImagesProduct($product->id);
        foreach($imagenes as $image):?>
          <div class="col-md-2">
          <div class="thumbnail container del_img" id="<?php echo $image->id; ?>">
            <a href="#" title="Eliminar"  > <img class="img-responsive" title="<?php echo $product->name; ?>" src="storage/products/<?php echo $image->image_name;?>" style="width:50%"></a>
            <div class="middle">
              <div class="text" title="Eliminar"><i class="fa fa-trash"></i></div>
            </div>
          </div>
          </div>
        <?php endforeach;?> 

</div>

<input type="hidden" name="images_id" id="images_id">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Codigo de barras*</label>
    <div class="col-md-8">
      <input type="text" name="barcode" class="form-control" id="barcode" value="<?php echo $product->barcode; ?>" placeholder="Codigo de barras del Producto">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre*</label>
    <div class="col-md-8">
      <input type="text" name="name" class="form-control" id="name" value="<?php echo $product->name; ?>" placeholder="Nombre del Producto">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Categoria</label>
    <div class="col-md-8">
    <select name="category_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($categories as $category):?>
      <option value="<?php echo $category->id;?>" <?php if($product->category_id!=null&& $product->category_id==$category->id){ echo "selected";}?>><?php echo $category->name;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Descripcion</label>
    <div class="col-md-8">
      <textarea name="description" class="form-control" id="description" placeholder="Descripcion del Producto"><?php echo $product->description;?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Precio de Entrada*</label>
    <div class="col-md-8">
      <input type="text" name="price_in" class="form-control" value="<?php echo $product->price_in; ?>" id="price_in" placeholder="Precio de entrada">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label" >Precio en Bs.</label>
    <div class="col-md-8">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_bsf" <?php if( $product->is_bsf ==1 ){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>
<div class="form-group">
  <label for="inputEmail1" class="col-lg-3 control-label">Porcentaje Gan.*</label>
   <div class="col-md-8">
  <select class="form-control" name="percentage" id="percentage" >
    

    <option value="5"  <?php if( $product->percentage ==5 ){ echo "selected";}?>>5</option>
    <option value="10" <?php if( $product->percentage ==10 ){ echo "selected";}?>>10</option>
    <option value="15" <?php if( $product->percentage ==15 ){ echo "selected";}?>>15</option>
    <option value="20" <?php if( $product->percentage ==20 ){ echo "selected";}?>>20</option>
    <option value="25" <?php if( $product->percentage ==25 ){ echo "selected";}?>>25</option>
    <option value="30" <?php if( $product->percentage ==30 ){ echo "selected";}?>>30</option>
    <option value="40" <?php if( $product->percentage ==40 ){ echo "selected";}?>>40</option>
    <option value="50" <?php if( $product->percentage ==50 ){ echo "selected";}?>>50</option>
    <option value="60" <?php if( $product->percentage ==60 ){ echo "selected";}?>>60</option>
    <option value="70" <?php if( $product->percentage ==70 ){ echo "selected";}?>>70</option>
    <option <?php if( $product->percentage == 80 ){ echo "selected";}?>>80</option>
    <option value="90" <?php if( $product->percentage ==90 ){ echo "selected";}?>>90</option>
    <option value="100" <?php if( $product->percentage ==100 ){ echo "selected";}?>>100</option>
    <option value="120" <?php if( $product->percentage ==120 ){ echo "selected";}?>>120</option>
    <option value="150" <?php if( $product->percentage ==150 ){ echo "selected";}?>>150</option>
    <option value="200" <?php if( $product->percentage ==200 ){ echo "selected";}?>>200</option>
    </select>
    </div>
</div> 

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Unidad*</label>
    <div class="col-md-8">
      <input type="text" name="unit" class="form-control" id="unit" value="<?php echo $product->unit; ?>" placeholder="Unidad del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Presentacion</label>
    <div class="col-md-8">
      <input type="text" name="presentation" class="form-control" id="inputEmail1" value="<?php echo $product->presentation; ?>" placeholder="Presentacion del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Minima en inventario:</label>
    <div class="col-md-8">
      <input type="text" name="inventary_min" class="form-control" value="<?php echo $product->inventary_min;?>" id="inputEmail1" placeholder="Minima en Inventario (Default 10)">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label" >Esta activo</label>
    <div class="col-md-8">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if($product->is_active){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-8">
    <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Producto</button>
      <a href="./?view=products" class="btn btn-danger">Regresar</a>

    </div>
  </div>
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>