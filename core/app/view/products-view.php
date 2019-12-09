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
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
<button type="buttom" class="btn btn-success">
	Tasa:  <?php echo number_format($valor_dolar,2,'.',','); ?><br>
	Fecha :</b> <?php echo date( 'd/m/Y', strtotime($fecha)); ?>

</button>
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
	<table class="table table-bordered table-hover table-responsive-sm datatableProducts"  width="100%"  >
		<thead>
			<tr>
				<th>Imagen</th>
				<th >Cod</th>
				<th >Nombre</th>
				<th >Descripcion</th>
				<th>Atributos</th>
				<th>Categoria</th>
				<th>Costo($)</th>
				<th>P-Venta($)</th>
				<th>P-Venta(Bs)</th>
				<th>Ganancia($)</th>
				<th>Ganancia(Bs)</th>
				<th>Porcentaje</th>
				<th>Unidad</th>
				<th>Presentacion</th>
				<th>Minima</th>
				<th>Status</th>
				<th>Ubicación</th>
				<th>Fecha</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Imagen</th>
				<th >Cod</th>
				<th >Nombre</th>
				<th >Descripcion</th>
				<th>Atributos</th>
				<th>Categoria</th>
				<th>Costo($)</th>
				<th>P-Venta($)</th>
				<th>P-Venta(Bs)</th>
				<th>Ganancia($)</th>
				<th>Ganancia(Bs)</th>
				<th>Porcentaje</th>
				<th>Unidad</th>
				<th>Presentacion</th>
				<th>Minima</th>
				<th>Status</th>
				<th>Ubicación</th>
				<th>Fecha</th>
				<th>Accion</th>
			</tr>
		</tfoot>	
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