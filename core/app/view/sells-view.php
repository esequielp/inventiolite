<?php
//ini_set("display_errors", 1);
$divisas = DivisaData::getLast();
$valor_dolar = $divisas[0]->monto;
$fecha = $divisas[0]->created_at;
?>
<div class="row">
	<div class="col-md-12">
		<h1><i class='glyphicon glyphicon-shopping-cart'></i> Lista de Ventas</h1>
		
		<div class="row">
			<div class="text-right">
				<button type="buttom" class="btn btn-success">
					Tasa:  <?php echo number_format($valor_dolar,2,'.',','); ?><br>
					Fecha :</b> <?php echo date( 'd/m/Y', strtotime($fecha)); ?>

				</button>
			</div>
		</div>
		<div class="clearfix"><br></div>

<?php

$products = SellData::getSells();

if(count($products)>0){

	?>
<br>
<table class="table table-bordered table-hover datatable	">
	<thead>
		<th></th>
		<th>Producto</th>
		<th>Total</th>
		<th>Fecha</th>
		<th></th>
	</thead>
	<?php foreach($products as $sell):?>

	<tr>
		<td style="width:30px;">
		<a href="index.php?view=onesell&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>

		</td>

		<td>
			<?php
			$operations = OperationData::getAllProductsBySellId($sell->id);
			$total= $sell->total-$sell->discount;
			foreach($operations as $operation){
				$product  = $operation->getProduct();
				$total += $operation->q*$product->price_out;
			}
			//$producto  = $operation->getProduct();
			//echo $producto->name;
			?>
			
		</td>
<td>

<?php

		echo "<b>$ ".number_format($total)."</b>";


?>			
</td>
		
		<td><?php echo $sell->created_at; ?></td>
		<td style="width:30px;"><a href="index.php?view=delsell&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
	</tr>

<?php endforeach; ?>

</table>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay ventas</h2>
		<p>No se ha realizado ninguna venta.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>