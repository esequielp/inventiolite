<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<div class="row">
<div class="col-md-12">
	<button class="btn btn-xs btn-success">$ Mostrar/Ocultar Divisa $</button>
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

<div class="btn-group pull-right">
	<a href="index.php?view=newdivisa" class="btn btn-default"><i class='fa fa-th-list'></i> Nueva Divisa</a>
</div>
		<h1>Control de Divisas</h1>
<br>
		<?php

		

		$divisas = DivisaData::getAll();
		if(count($divisas)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover ">
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
				<td style="width:130px;"><a href="index.php?view=editdivisa&id=<?php echo $divisa->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a> <a href="index.php?view=deldivisa&id=<?php echo $divisa->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Cambio de Divisas</p>";
		}


		?>


	</div>
</div>