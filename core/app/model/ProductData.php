<?php
class ProductData {
	public static $tablename = "product";

	public function ProductData(){
		$this->name = "";
		$this->price_in = "";
		$this->price_out = "";
		$this->percentage = "";
		$this->unit = "";
		$this->user_id = "";
		$this->presentation = "0";
		$this->created_at = "NOW()";
		$this->is_bsf = "";
	}

	public function getCategory(){ return CategoryData::getById($this->category_id);}

	public function add(){
		$pg = $this->percentage;
		$divisas = DivisaData::getAll();
		//ultimo valor del dolar  
		$ultimo_elemento=count($divisas)-1; 
		$valor_dolar = ($divisas[$ultimo_elemento]->monto);
		$finalPrice = ((($this->price_in * $pg) /100 ) + $this->price_in ) * $valor_dolar ;	

		$sql = "insert into ".self::$tablename." (barcode,name,description,price_in,price_out,percentage,user_id,presentation,unit,category_id,inventary_min,is_bsf,created_at) ";
		$sql .= "value (\"$this->barcode\",\"$this->name\",\"$this->description\",\"$this->price_in\",\"$finalPrice\",\"$this->percentage\",$this->user_id,\"$this->presentation\",\"$this->unit\",$this->category_id,$this->inventary_min,\"$this->is_bsf\",NOW())";
		
		return Executor::doit($sql);

	}
	public function add_with_image(){

		$pg = $this->percentage;
		$divisas = DivisaData::getAll();
		//ultimo valor del dolar  
		$ultimo_elemento=count($divisas)-1; 
		$valor_dolar = ($divisas[$ultimo_elemento]->monto);
		$finalPrice = ((($this->price_in * $pg) /100 ) + $this->price_in ) * $valor_dolar ;


		$sql = "insert into ".self::$tablename." (barcode,image,name,description,price_in,price_out,percentage,user_id,presentation,unit,category_id,inventary_min,is_bsf,created_at) ";
		$sql .= "value (\"$this->barcode\",\"$this->image\",\"$this->name\",\"$this->description\",\"$this->price_in\",\"$finalPrice\",\"$this->percentage\",$this->user_id,\"$this->presentation\",\"$this->unit\",$this->category_id,$this->inventary_min,\"$this->is_bsf\",NOW())";

			//echo $sql;
			//exit;
		return Executor::doit($sql);

	}

	public function add_images_product($fileName, $idproduct){
		$sql = "insert into images (image_name,id_product,created_at) ";
		$sql .= "value (\"$fileName\",$idproduct,NOW() )";
		//echo $sql;
		//exit;		
		
		return Executor::doit($sql);
    
	}	

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function update(){
		//	porcentaje de ganancia 
		$pg = $this->percentage;
		$divisas = DivisaData::getAll();
		//ultimo valor del dolar  
		$ultimo_elemento=count($divisas)-1; 
		$valor_dolar = ($divisas[$ultimo_elemento]->monto);
		$finalPrice = ((($this->price_in * $pg) /100 ) + $this->price_in ) * $valor_dolar ;
		
			$sql = "update ".self::$tablename." set barcode=\"$this->barcode\",name=\"$this->name\",price_in=\"$this->price_in\",price_out=\"$finalPrice\",unit=\"$this->unit\",presentation=\"$this->presentation\",category_id=$this->category_id,inventary_min=\"$this->inventary_min\",description=\"$this->description\",is_active=\"$this->is_active\",is_bsf=\"$this->is_bsf\" where id=$this->id";
		Executor::doit($sql);
	    //actualizo precio
	}

	public function updatePriceOut($price){
		//	porcentaje de ganancia 
		$configurations = ConfigurationData::getById(9);
		$pg =  $configurations ->val;
		$divisas = DivisaData::getAll();
		//ultimo valor del dolar  
		$ultimo_elemento=count($divisas)-1; 
		$valor_dolar = ($divisas[$ultimo_elemento]->monto);


		//busco los precios de los productos
		$products = ProductData::getAllActive();	
		
		foreach($products as $product):
		$finalPrice = ((($product->price_in * $pg) /100 ) + $product->price_in ) * $valor_dolar ;
			//echo $finalPrice ."<br>";
		//actualizo el precio salida
		$sql = "update ".self::$tablename." set price_out=\"$finalPrice\" where id=".$product->id;
		endforeach;	
		Executor::doit($sql);
	}

	public function del_category(){
		$sql = "update ".self::$tablename." set category_id=NULL where id=$this->id";
		Executor::doit($sql);
	}


	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductData());

	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getAllActive(){
		$sql = "select * from ".self::$tablename." where is_active=1" ;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	

	public static function getImagesProduct($id){
		$sql = "select * from images where id_product=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where barcode like '%$p%' or name like '%$p%' or id like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}



	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getAllByCategoryId($category_id){
		$sql = "select * from ".self::$tablename." where category_id=$category_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	//test data INSERT

	public function addTestData($cant){
	$pg = 30;
	$divisas = DivisaData::getAll();
	//ultimo valor del dolar  
	$ultimo_elemento=count($divisas)-1; 

	$x =0;
	$idcategoria = 1;
	
	$sql = "insert into ".self::$tablename." (name,description,price_in,price_out,percentage,user_id,unit,category_id,inventary_min,created_at) value ";

	$sql2 ="";
	while ( $x <= $cant) {
		# code...
		$nombreProduct  = "PRODUCTO - " . $x ;
		$descripcionProduct  = "DESCRIPCION - " . $x ;
		$valor_dolar = ($divisas[$ultimo_elemento]->monto);
		$precioIn = rand(10,100);
		$finalPrice = ((($precioIn * $pg) /100 ) + $precioIn ) * $valor_dolar ;	


		$sql2 .= "(\"$nombreProduct\",\"$descripcionProduct\",$precioIn,$finalPrice,30,1,1,$idcategoria,1,NOW()),";

		//echo $sql ."<br><br>";
	$x++;
		if ($idcategoria == 1 ) {
			$idcategoria = 2;
			# code...
		}else{
			$idcategoria = 1;
		}

	}
	$sqlall = $sql . $sql2 ;
	$sql_final = substr($sqlall, 0, -1);
	//echo $sql_final;
	Executor::doit($sql_final);		

	}

	// INSERT IMAGES
	public function addImageData($idpdt){
	$products = ProductData::getAll();

	$sql = "insert into images (image_name,id_product) values ";
	$sql2= "";
	foreach($products as $product):
	
	    if ($product->id > $idpdt){
		$idprod = $product->id;
			$sql2 .= "('Reloj-Inteligente-Smart-Watch-V8-Dorado-Dz09-1.jpg',$idprod),"	;
		
		}
	endforeach;

	$sqlall = $sql . $sql2 ;
	$sql_final = substr($sqlall, 0, -1);
	//echo $sql_final;
	Executor::doit($sql_final);	
	}

}

?>