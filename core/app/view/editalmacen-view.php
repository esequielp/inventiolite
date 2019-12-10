<?php $user = AlmacenData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h3>Editar Almacen</h3>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatealmacen" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Almacen*</label>
    <div class="col-md-6">
      <input type="text" name="name" required  value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>  
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Descripción*</label>
    <div class="col-md-6">
      <input type="text" name="description" value="<?php echo $user->description;?>" class="form-control" id="description" placeholder="Descripción">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a href="javascript:history.back(-1);" class="btn btn-danger">Cancelar</a>
    </div>
  </div>
</form>
	</div>
</div>