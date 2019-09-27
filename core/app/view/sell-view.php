<?php
//ini_set("display_errors", 1);
$divisas = DivisaData::getLast();
$valor_dolar = $divisas[0]->monto;
$fecha = $divisas[0]->created_at;
?>
<div class="row">
<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
	<h5 class="text-right"><b>Precio del Dolar : </b><?php echo number_format($valor_dolar,2,'.',','); ?></h5>
	<h5 class="text-right"><b>Fecha : </b><?php echo  date( 'd/m/Y', strtotime($fecha)); ?></h5>
</div>
</div>
<div class="row">
	<div class="col-md-12">
	<h1>Venta</h1>
	<p><b>Buscar producto por nombre o por codigo:</b></p>
		<form id="searchp">
		<div class="row">
			<div class="col-md-6">
				<input type="hidden" name="view" value="sell">
				<input type="text" id="product_code" name="product" class="form-control">
			</div>
			<div class="col-md-3">
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
			</div>
		</div>
		</form>
	</div>
</div>
<div class="se-pre-con"></div>	
<div id="show_search_results"></div>
<script>
//jQuery.noConflict();

$(document).ready(function(){
	$("#searchp").on("submit",function(e){
		e.preventDefault();
		
		$(".se-pre-con").show();	
		$.get("./?action=searchproduct",$("#searchp").serialize(),function(data){
			$("#show_search_results").html(data);
			$(".se-pre-con").hide();
		});
		
		$("#product_code").val("");

	});
	});

</script>

<?php if(isset($_SESSION["errors"])):?>
<h2>Errores</h2>
<p></p>

<div class="row">
<div class="col-md-12 col-sm-8 col-ms-6 col-xs-12">
<table class="table table-bordered table-hover table-responsive-sm"  width="100%"  >
<tr class="danger">
	<th>Codigo</th>
	<th>Producto</th>
	<th>Mensaje</th>
</tr>
<?php foreach ($_SESSION["errors"]  as $error):
$product = ProductData::getById($error["product_id"]);
?>
<tr class="danger">
	<td><?php echo $product->barcode; ?></td>
	<td><?php echo $product->name; ?></td>
	<td><b><?php echo $error["message"]; ?></b></td>
</tr>

<?php endforeach; ?>
</table>
</div>
</div>
<?php
unset($_SESSION["errors"]);
 endif; ?>


<!--- Carrito de compras :) -->
<?php if(isset($_SESSION["cart"])):
$total = 0;
?>
<h3>Lista de venta</h3>
<div class="table-responsive">
<table class="table "  >
<thead>
	<th >Codigo</th>
	<th >Cantidad</th>
	<th >Unidad</th>
	<th >Producto</th>
	<th >P.Unit($)</th>
	<th >P.Total($)</th>
	<th >P.Unit(Bs)</th>
	<th >P.Total(Bs)</th>
	<th >Accion</th>
</thead>
<?php foreach($_SESSION["cart"] as $p):
$product = ProductData::getById($p["product_id"]);
?>
<tr >
	<td><?php echo $product->barcode; ?></td>
	<td ><?php echo $p["q"]; ?></td>
	<td><?php echo $product->unit; ?></td>
	<td><?php echo $product->name; ?></td>
	<td><b>Bs <?php echo number_format($product->price_out,2,'.',','); ?></b></td>
	<td><b>Bs <?php  $pt = $product->price_out*$p["q"]; $total +=$pt; echo number_format($pt,2,'.',','); ?></b>
	<td><b>Bs <?php echo number_format($product->price_out_bs,2,'.',','); ?></b></td>
	<td><b>Bs <?php  $pt = $product->price_out_bs*$p["q"]; $total +=$pt; echo number_format($pt,2,'.',','); ?></b>	
	</td>
	<td ><a href="index.php?view=clearcart&product_id=<?php echo $product->id; ?>" class="btn btn-danger  btn-xs"><i class="glyphicon glyphicon-remove"></i> Cancelar</a></td>
</tr>

<?php endforeach; ?>
</table>
</div>
<form method="post" class="form-horizontal" id="processsell" action="index.php?view=processsell">
<h3>Resumen</h3>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
    <div class="col-lg-10">
    <?php 
$clients = PersonData::getClients();
    ?>
    <select name="client_id" class="form-control select2">
    <option value="">-- NINGUNO --</option>
    <?php foreach($clients as $client):?>
    	<option value="<?php echo $client->id;?>"><?php echo $client->name." ".$client->lastname;?></option>
    <?php endforeach;?>
    	</select>
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descuento</label>
    <div class="col-lg-10">
      <input type="text" name="discount" class="form-control" required value="0" id="discount" placeholder="Descuento">
    </div>
  </div>
 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Efectivo</label>
    <div class="col-lg-10">
      <input type="text" name="money" required class="form-control" id="money" placeholder="Efectivo">
    </div>
  </div>
      <input type="hidden" name="total" value="<?php echo $total; ?>" class="form-control" placeholder="Total">

  <div class="row">
<div class="col-md-6 col-md-offset-6">
<table class="table table-bordered">
<tr>
	<td><p>Subtotal</p></td>
	<td><p><b>Bs <?php echo number_format($total*.88,2,'.',','); ?></b></p></td>
</tr>
<tr>
	<td><p>IVA (12%)</p></td>
	<td><p><b>Bs <?php echo number_format($total*.12,2,'.',','); ?></b></p></td>
</tr>
<tr>
	<td><p>Total</p></td>
	<td><p><b>Bs <?php echo number_format($total,2,'.',','); ?></b></p></td>
</tr>

</table>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input name="is_oficial" type="hidden" value="1">
        </label>
      </div>
    </div>
  </div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
		<a href="index.php?view=clearcart" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
        <button class="btn btn-lg btn-primary"><i ></i><i class="glyphicon glyphicon-ok"></i> Finalizar Venta</button>
        </label>
      </div>
    </div>
  </div>
</div>
</form>
<script>
	$("#processsell").submit(function(e){
		discount = $("#discount").val();
		money = $("#money").val();
		if(money<(<?php echo $total;?>-discount)){
			alert("No se puede efectuar la operacion");
			e.preventDefault();
		}else{
			if(discount==""){ discount=0;}
			go = confirm("Cambio: $"+(money-(<?php echo $total;?>-discount ) ) );
			if(go){}
				else{e.preventDefault();}
		}
	});
</script>
</div>
</div>

<br><br><br><br><br>
<?php endif; ?>

</div>