<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<div class="row">
<div class="col-md-12">
	<button class="btn btn-xs btn-success" id="ShowDivisa">$ Mostrar/Ocultar Divisa $</button>
</div>
<div class="col-md-12">

<div class="col-md-4">
<div id="twitter">
<a class="twitter-timeline"
  href="https://twitter.com/monitordolarvzl"
  data-width="300"
  data-height="300">
Tweets by @TwitterDev
</a>
</div>
</div>
<div class="col-md-4">
<div id="twitter2">
<a class="twitter-timeline"
  href="https://twitter.com/DolarToday"
  data-width="300"
  data-height="300">
Tweets by @TwitterDev
</a>
</div>
</div>
<div class="col-md-4">
<div id="twitter3">
<a class="twitter-timeline"
  href="https://twitter.com/interbanex"
  data-width="300"
  data-height="300">
Tweets by @TwitterDev
</a>
</div>
</div>


<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
	<h2>Control de Divisas</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
		<div class="btn-group  pull-right">
			<a href="index.php?view=newdivisa" class="btn btn-default btn-sm">Nueva Divisa</a>
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-download"></i> Descargar <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="report/divisa-word.php">Word 2007 (.docx)</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<br>
<?php
$divisas = DivisaData::getAll();
if(count($divisas)>0){
	// si hay usuarios
	?>
<div class="row">
<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
			<table class="table table-bordered table-hover table-sm datatable"  width="100%"  >
			<thead>
			<th >Fecha</th>
			<th>Precio</th>
			<th>Fuente</th>
			<th></th>
			</thead>
			<?php
			
			foreach($divisas as $divisa){
			$date=date_create($divisa->created_at);
			?>
				<tr>
				<td><?php echo date_format($date,"d/m/Y h:i A"); ?></td>
				<td><?php echo number_format($divisa->monto, 2); ?></td>
				<td><?php echo $divisa->fuente; ?></td>
				<td style="width:70px;"><a href="index.php?view=editdivisa&id=<?php echo $divisa->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a> <a href="index.php?view=deldivisa&id=<?php echo $divisa->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php
			}

		}else{
			echo "<p class='alert alert-danger'>No hay Cambio de Divisas</p>";
		}
		?>
	</table>
	</div>
</div>
