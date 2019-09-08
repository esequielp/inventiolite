<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
	<h2>Categorias</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newcategory" class="btn btn-default btn-sm"><i class='fa fa-list'></i> Nueva Categoria</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/category-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
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
			<th></th>
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