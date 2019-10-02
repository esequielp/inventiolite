<div class="row">
	<div class="col-md-12">
	<h1>Nueva Divisa</h1>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?view=adddivisa" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label ">Monto*</label>
    <div class="col-md-3">
      <input type="text" name="monto" required class="form-control allownumericwithdecimal" id="monto" placeholder="Monto (Ejm: 10000,00)">
    </div>
  </div>
 
<div class="form-group">
  <label for="inputEmail1" class="col-lg-2 control-label">Fuente*</label>
    <div class="col-md-3">
      <input type="text" name="fuente" required class="form-control" id="fuente" placeholder="Fuente">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Divisa</button>
    <a href="./?view=divisas" class="btn btn-danger">Cancelar</a>
    </div>
  </div>
</form>
	</div>
</div>