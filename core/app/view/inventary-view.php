<?php
	$productsAlertStockTotal = ProductData::getCountAlertStock();
	$divisas = DivisaData::getLast();
	$valor_dolar = $divisas[0]->monto;
	$fecha = $divisas[0]->created_at;
?>

<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
			<h2><i class="glyphicon glyphicon-stats"></i> Inventario de Productos</h2>		
	</div>
</div>
<div class="row">
	<div class="text-right">
<button type="buttom" class="btn btn-success">
	Tasa:  <?php echo number_format($valor_dolar,2,'.',','); ?><br>
	Fecha :</b> <?php echo date( 'd/m/Y', strtotime($fecha)); ?>

</button>
	</div>
</div>
<div class="clearfix"></div>
<br>
<?php if($productsAlertStockTotal[0]->total>0){?>

<div class="Responsive">

  <table class="table table-bordered table-hover table-responsive-sm datatableInventary"  width="100%"  >

	<thead>
		<th >id.</th>
		<th>Codigo</th>
		<th>Producto</th>
		<th>Disponible</th>
		<th>Categoria</th>
		<th>Accion</th>
		<th>Accion</th>
	</thead>
<tfoot>
    <tr>
    	<th >id.</th>
    	<th>Codigo</th>
		<th>Producto</th>
		<th>Disponible</th>
		<th>Categoria</th>
		<th>Accion</th>	
		<th>Accion</th>
	</tr>
</tfoot>	
</table>
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