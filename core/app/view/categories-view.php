<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
	<h2>Categorias</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newcategory" class="btn btn-info"><i class='fa fa-plus'></i> Nueva Categoria</a>
</div>
<div class="clearfix"></div>
<br>
		<?php

		$users = CategoryData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover datatable">
			<thead>
			<th>Nombre</th>
			<th>Accion</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td style="width:50px;">
					<a title="Editar" href="index.php?view=editcategory&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a> 
					<a title="Eliminar" href="index.php?view=delcategory&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php
			}
		}else{
			echo "<p class='alert alert-danger'>No hay Categorias</p>";
		}
		?>
			</table>

	</div>
</div>