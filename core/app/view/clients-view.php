<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
	<h2>Directorio de Clientes</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
		<div class="btn-group  pull-right">
			<a href="index.php?view=newclient" class="btn btn-default btn-sm">Nuevo Cliente</a>
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-download"></i> Descargar <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<br>		
<?php

$users = PersonData::getClients();
if(count($users)>0){
// si hay usuarios
?>
<div class="row">
<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
			<table class="table table-bordered table-hover table-sm datatable"  width="100%"  >
			<thead>
			<th>Nombre completo</th>
			<th>Direccion</th>
			<th>Email</th>
			<th>Telefono</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->address1; ?></td>
				<td><?php echo $user->email1; ?></td>
				<td><?php echo $user->phone1; ?></td>
				<td style="width:50px;">
				<a  title="Editar" href="index.php?view=editclient&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
				<a title="Eliminar" href="index.php?view=delclient&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php
			}
		}else{
			echo "<p class='alert alert-danger'>No hay clientes</p>";
		}
		?>
		</table>
	</div>
</div>