<?php $user = SubCategoryData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h3>Nueva Subcategoría</h3>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addsubcategory" role="form">
<?php
  $id=$_GET["id"];
  $category = CategoryData::getById($id);
?>


  <div class="form-group">
    <label for="inputEmail1" class="col-md-4 control-label">Categoría*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $category->name;?>" class="form-control" id="name" placeholder="
      Nombre" readonly>
      <input type="hidden" name="category_id" value="<?php echo $_GET["id"];?>" >
    </div>

  </div>
 <div class="form-group">
     <label for="inputEmail1" class="col-md-4 control-label">Subcategoría*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" >
    </div> 
</div>      


  <div class="form-group">
    <div class="col-md-offset-4 col-md-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Crear</button>
      <a href="javascript:history.back(-1);" class="btn btn-danger">Cancelar</a>
    </div>
  </div>
</form>
	</div>
</div>