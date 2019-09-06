<?php $divisa = DivisaData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Divisa</h1>
	<br>
		<form class="form-horizontal" method="post" id="adddivisa" action="index.php?view=updatedivisa" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Monto*</label>
    <div class="col-md-3">
      <input type="text" name="monto" value="<?php echo $divisa->monto;?>" class="form-control" id="monto" placeholder="Monto">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fuente*</label>
    <div class="col-md-3">
      <input type="text" name="fuente" value="<?php echo $divisa->fuente;?>" class="form-control" id="fuente" placeholder="Fuente">
    </div>    
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="divisa_id" value="<?php echo $divisa->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Divisa</button>
    </div>
  </div>
</form>
	</div>
</div>