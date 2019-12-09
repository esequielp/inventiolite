    <?php 
$categories = CategoryData::getAll();
    ?>
<?php
ini_set("display_errors", 0);

$divisas = DivisaData::getLast();
$valor_dolar = $divisas[0]->monto;
$fecha = $divisas[0]->created_at;
//$insertProduct = ProductData::addTestData(50000);
//$insertImage = ProductData::addImageData(2049);

//ulmito valor del dolar  
?>
<div class="row">
  <div class=" text-right">
    <button type="buttom" class="btn btn-success">
      Tasa: <?php echo number_format($valor_dolar,2,'.',','); ?><br>
      Fecha :</b> <?php echo date( 'd/m/Y', strtotime($fecha)); ?>

    </button>
<input type="text" id="tasa" value="<?php echo $valor_dolar; ?>">
    </div>
</div>

<div class="row">
	<div class="col-md-12">
	<h3>Nuevo Producto</h3>
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="index.php?view=addproduct" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Imagen</label>
    <div class="col-md-6">
      <input type="file" name="images[]" id="images" multiple  placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Codigo*</label>
    <div class="col-md-6">
      <input type="text" name="barcode" required id="product_code" class="form-control" id="barcode" placeholder="Codigo del Producto" style="text-transform:uppercase;" maxlength="15">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre del Producto" style="text-transform:capitalize;" maxlength="100">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Categoría*</label>
    <div class="col-md-6">
      <select name="category_id" id="category_id" class="form-control select2" required>
      <option value="">-- NINGUNA --</option>
      <?php foreach($categories as $category):?>
        <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
      <?php endforeach;?>
        </select>    
    </div>
  </div>  
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Subcategoría*</label>
    <div class="col-md-6">
      <select name="subcategory_id" id="subcategory_id" class="form-control select2" readonly>
      <option value="">-- NINGUNA --</option>
        </select>    
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label" >Descripcion</label>
    <div class="col-md-6">
      <textarea name="description" class="form-control" id="description" placeholder="Descripcion del Producto"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Atributos</label>
    <div class="col-md-6">
      <textarea name="attribute" class="form-control" id="attribute" placeholder="Marca-Modelo-Etc (Separar con - )"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Ubicación</label>
    <div class="col-md-6">
      <textarea name="location" class="form-control" id="location" placeholder="Ubicacion en Almacen (Separar con - )"></textarea>
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label" >Precio en Bs.</label>
    <div class="col-md-6">
    <div >
 <label class="customcheck">SI
          <input type="checkbox" name="is_bsf" id="is_bsf">
          <span class="checkmark"></span>
        </label>
        <input type="text" name="precio_bs" id="precio_bs">
    </div>
    </div>
</div>
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Precio de Entrada*</label>
    <div class="col-md-6">
      <input type="text" name="price_in" required class="form-control allownumericwithdecimal" id="price_in" placeholder="Precio de entrada(use . para los decimales)" maxlength="10">
    </div>
  </div>
     
 <div class="form-group">
  <label for="inputEmail1" class="col-md-2 control-label">Porcentaje Gan.*</label>
   <div class="col-md-6">
  <select class="form-control" name="percentage" id="percentage" >
    <option value="5">5</option>
    <option value="10" >10</option>
    <option value="15">15</option>
    <option value="20">20</option>
    <option value="25">25</option>
    <option value="30" selected>30</option>
    <option value="40">40</option>
    <option value="50">50</option>
    <option value="60">60</option>
    <option value="70">70</option>
    <option value="80">80</option>
    <option value="90">90</option>
    <option value="100">100</option>
    <option value="120">120</option>
    <option value="150">150</option>
    <option value="200">200</option>
    </select>
    </div>
</div> 
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Unidad*</label>
    <div class="col-md-6">
      <input type="text" name="unit" required class="form-control allownumericwithoutdecimal" id="unit" placeholder="Unidad del Producto" maxlength="4">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Presentacion</label>
    <div class="col-md-6">
      <input type="text" name="presentation" class="form-control" id="inputEmail1" placeholder="Presentacion del Producto" maxlength="50">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Minima en inventario:</label>
    <div class="col-md-6">
      <input type="text" name="inventary_min" class="form-control allownumericwithoutdecimal" id="inputEmail1" placeholder="Minima en Inventario (Default 10)" maxlength="4">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Inventario inicial:</label>
    <div class="col-md-6">
      <input type="text" name="q" class="form-control allownumericwithoutdecimal" id="inputEmail1" placeholder="Inventario inicial" maxlength="4">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
      <button type="submit" class="btn btn-primary">Agregar Producto</button>
      <a href="./?view=products" class="btn btn-danger">Regresar</a>
    </div>
  </div>
</form>

	</div>
</div>