	<?php
  $found=true;
  $products = ProductData::getAll();
  foreach($products as $product){
   $q=OperationData::getQYesF($product->id);	
   if($q<=$product->inventary_min){
    $found=true;
    break;
  }
}
?>

<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
		<h2>Bienvenido Sistema de Ventas</h2>
</div>
</div>
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(ProductData::getAll());?></h3>

              <p>Productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="./?view=products" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo count(PersonData::getClients());?></h3>

              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?view=clients" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count(PersonData::getProviders());?></h3>

              <p>Proveedores</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="./?view=providers" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count(CategoryData::getAll());?></h3>

              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="./?view=categories" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

<div class="row">

<div class="clearfix"></div>

    <h3 class="col-md-12">Productos Alerta Stock</h3>

</div>

<?php if(count($products)>0){?>


<div class="Responsive">

<table class="table table-bordered table-hover table-responsive-sm datatable"  width="100%"  >
	<thead>
		<th >Cod.</th>
		<th>Producto</th>
		<th>Cant</th>
    <th>Categoria</th>
    <th>Stock</th>
	</thead>
	<?php
foreach($products as $product):
	$q=OperationData::getQYesF($product->id);
	?>
	<?php if($q<=$product->inventary_min):?>
	<tr class="<?php if($q==0){ echo "danger"; }else if($q<=$product->inventary_min/2){ echo "danger"; } else if($q<=$product->inventary_min){ echo "warning"; } ?>">
		<td><?php echo $product->id;  ?></td>
		<td><?php echo $product->name; ?></td>
    <td><?php echo $q; ?></td>
    <td><?php 

    $categories = CategoryData::getById($product->category_id);
    echo  $category = $categories->name;
    ?></td>
		<td style="width:93px;">
		<?php if($q==0){ echo "<span class='label label-danger'><i class='glyphicon glyphicon-minus-sign'></i> Sin Stock.</span>";
       echo "<a href='index.php?view=input&product_id=$product->id' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-circle-arrow-up'></i> Alta</a>";

  }else if($q<=$product->inventary_min/2){ echo "<span class='label label-danger'>Muy bajo Stock.</span>";
       echo "<a href='index.php?view=input&product_id=$product->id' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-circle-arrow-up'></i> Alta</a>";

} else if($q<=$product->inventary_min){ echo "<span class='label label-warning'>Poco stock.</span>";
       echo "<a href='index.php?view=input&product_id=$product->id' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-circle-arrow-up'></i> Alta</a>";

} ?>
		</td>
	</tr>
<?php endif;?>
<?php
endforeach;
?>
</table>
</div>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay alertas</h2>
		<p>Por el momento no hay alertas de inventario, estas se muestran cuando el inventario ha alcanzado el nivel minimo.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	
</div>