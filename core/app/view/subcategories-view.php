<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
	<h2>SubcategorÍas</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newsubcategory&id=<?php echo $_GET["id"];?>" class="btn btn-info"><i class='fa fa-plus'></i> Nueva SubcategorÍa</a>
</div>
<div class="clearfix"></div>
<br>
<?php
	$id=$_GET["id"];
	$category = CategoryData::getById($id);
?>
<h3>CATEGORÍA: <?php echo $category->name; ?></h3> 
<a href="javascript:history.back(-1);" class="btn btn-success btn-xs"><i class='glyphicon glyphicon-backward'></i> Regresar</a>
<br><br>	


		<?php

		$users = SubCategoryData::getAll($id);
		if(count($users)>0){
			// si hay usuarios
			?>


			<table class="table table-bordered table-hover datatable">
			<thead>
			<th>Subcategorías</th>
			<th>Accion</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td ><!-- <a href="index.php?view=subcategories&id=<?php echo $user->id;?>" title="Pulse para ver las SubCategoria">   -->

					<?php echo $user->name; ?>
					<!--  </a> -->
				</td>
				<td style="width:50px;">
					<!-- <a title="Nueva SubCategoria" href="index.php?view=newsubcategory&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-th-list"></i></a>  -->
					<a title="Editar" href="index.php?view=editsubcategory&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a> 
					<a title="subcategoria: <?php echo $user->name; ?>" href="index.php?view=delsubcategory&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs del_item"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php
			}
		}else{
			echo "<p class='alert alert-danger'>No hay Subcategorías</p>";
		}
		?>
			</table>

	</div>
</div>