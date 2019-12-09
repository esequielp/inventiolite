<div class="row">
	<div class="col-md-12">
	<h3>Nueva Divisa</h3>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?view=adddivisa" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-md-2 control-label ">Monto*</label>
    <div class="col-md-3">
      <input type="text" name="monto" required class="form-control allownumericwithdecimal" id="monto" placeholder="Monto (Ejm: 10000,00)">
    </div>
  </div>
 
<div class="form-group">
  <label for="inputEmail1" class="col-md-2 control-label">Fuente*</label>
    <div class="col-md-3">
      <input type="text" name="fuente" required class="form-control" id="fuente" placeholder="Fuente">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
      <button type="submit" class="btn btn-primary" id="newdivisa">Agregar</button>
      <a href="javascript:history.back(-1);" class="btn btn-danger">Cancelar</a>
    </div>
  </div>
</form>
	</div>
</div>