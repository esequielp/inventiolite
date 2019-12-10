<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
	<h2>Almacenes</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newalmacen" class="btn btn-info"><i class='fa fa-plus'></i> Nuevo Almacen</a>
</div>
<div class="clearfix"></div>
<br>

		<?php

		$users = AlmacenData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover datatable">
			<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acción</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td ><a href="index.php?view=ubicacion&id=<?php echo $user->id;?>" title="Pulse para ver las SubCategoria">  <?php echo $user->name; ?> </a></td>
				<td ><?php echo $user->description; ?> </a></td>
				<td style="width:80px;">
					<a title="Nueva ubicacion" href="index.php?view=newubicacion&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-th-list"></i></a> 
					<a title="Editar" href="index.php?view=editalmacen&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a> 
					<a title="Almacen: <?php echo $user->name; ?>" href="index.php?view=delalmacen&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs del_item"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php
			}
		}else{
			echo "<p class='alert alert-danger'>No hay Almacenes</p>";
		}
		?>
			</table>

	</div>
</div>