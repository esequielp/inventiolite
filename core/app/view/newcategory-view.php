<div class="row">
	<div class="col-md-12">
	<h3>Nueva Categoría</h3>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?view=addcategory" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label">Categoría*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre"  style="text-transform:uppercase;">
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