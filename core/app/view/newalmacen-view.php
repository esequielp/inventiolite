<div class="row">
	<div class="col-md-12">
	<h3>Nuevo Almacen</h3>
	<br>
		<form class="form-horizontal" method="post" id="addalmacen" action="index.php?view=addalmacen" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Almacen*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre"  style="text-transform:uppercase;">
    </div>
  </div>  
  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Descripción</label>
    <div class="col-md-6">
      <input type="text" name="description" class="form-control" id="description" placeholder="Descripción"  style="text-transform:uppercase;">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
      <button type="submit" class="btn btn-primary">Agregar</button>
      <a href="javascript:history.back(-1);" class="btn btn-danger">Cancelar</a>
    </div>
  </div>
</form>
	</div>
</div>