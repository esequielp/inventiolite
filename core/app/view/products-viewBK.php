<?php
$divisas = DivisaData::getAll();

//$insertProduct = ProductData::addTestData(1000);	
//$insertImage = ProductData::addImageData();

//ulmito valor del dolar  
$ultimo_elemento=count($divisas)-1; 
$valor_dolar = ($divisas[$ultimo_elemento]->monto);
?>
<div class="row">
<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
<h2 >Lista de Productos</h2>
	<h5>Precio del Dolar : <?php echo number_format($valor_dolar,2,'.',','); ?></h5>
</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
		<div class="btn-group  pull-right">
			<a href="index.php?view=newproduct" class="btn btn-info "><i class="fa fa-plus" aria-hidden="true"></i>
Agregar Producto</a>
		</div>
	</div>
</div>
<div class="clearfix"></div>	
<br>
<?php
$products = ProductData::getAll();
if(count($products)>0){
?>
<div class="row">
<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
<table class="table table-bordered table-hover table-sm datatableProducts"  width="100%"  >
	<thead>
		<tr>
		<!-- <th>Cod. Bar</th> -->
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Costo</th>
		<th>Costo($)</th>
		<th>Precio($)</th>
		<th>Precio(Bs)</th>
		<th>Ganancia</th>
		<th>Categoria</th>
		<!-- <th>Minima</th> -->
		<th>Status</th>
		<th>Acciones</th>
		
		</tr>
	</thead>
	<tbody>
	<?php foreach($products as $product):
		$PrecioNeto = $product->price_in * $valor_dolar  ;
		$PrecioGanciaDL = (($product->price_in * $product->percentage) /100 )  + $product->price_in ;
		$PrecioGanciaBs = ((($product->price_in *$product->percentage) /100 ) * $valor_dolar ) ;
		$PrecioVentaBS = $PrecioNeto + $PrecioGanciaBs;
		
	?>
	<tr id="<?php echo $product->id; ?>">
		<!-- <td><?php echo $product->barcode; ?></td> -->
		<td>
			<?php 
			$imagenes = ProductData::getImagesProduct($product->id);
			?>
			<a title="<?php echo $product->name; ?>" href="#"> 
				<img class="thumbnail img-responsive" id="image-<?php echo $product->id; ?>" src="storage/products/<?php echo $imagenes[0]->image_name;?>"  style="width:64px;" >
			</a>
			<!-- LEER TODAS LAS IMAGENES DE UN PRODUCTO  --->		
		    <div class="hidden" id="img-repo">
			<?php foreach($imagenes as $image):?>
				<div class="item" id="image-<?php echo $product->id; ?>">
					<img class="thumbnail img-responsive" title="<?php echo $product->name; ?>" src="storage/products/<?php echo $image->image_name;?>" >
				</div>
				<?php endforeach;?>	
			</div>
    	</td>
		<td><?php echo $product->name; ?></td>

		<td>$ <?php echo number_format($product->price_in,2,'.',','); ?></td>
		<td>$ <?php echo number_format($product->price_in,2,'.',','); ?></td>
		<td>Bs <?php echo number_format($PrecioGanciaDL,2,'.',','); ?></td>
		<td>Bs <?php echo number_format($PrecioVentaBS,2,'.',','); ?></td>
		<td>Bs <?php echo number_format($PrecioGanciaBs,2,'.',',');	?></td> 
		<td><?php if($product->category_id!=null){echo $product->getCategory()->name;}else{ echo "<center>----</center>"; }  ?></td>
		<!-- <td><?php echo $product->inventary_min; ?></td> -->
		<td ><?php if($product->is_active): ?><i class="fa fa-check"></i><?php endif;?></td>
		<td style="width:80px;">
		<a title="Editar" href="index.php?view=editproduct&id=<?php echo $product->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a title="Eliminar" href="index.php?view=delproduct&id=<?php echo $product->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		<a title="Duplicar" class="btn btn-xs btn-info clone" id="<?php echo $product->id; ?>"><i class="glyphicon glyphicon-file"></i></a>
		</td>
				
	</tr>
			<?php endforeach;?>
		</tbody>
		</table>
</div>
</div>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay productos</h2>
		<p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
<div class="modal" id="modal-gallery" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">×</button>
				<h3 class="modal-title"></h3>
			</div>
			<div class="modal-body">
				<div id="modal-carousel" class="carousel">
					<div class="carousel-inner">           
					</div>
					<a class="carousel-control left" href="#modal-carousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
					<a class="carousel-control right" href="#modal-carousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>