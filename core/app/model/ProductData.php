<?php
//ini_set("display_errors", 1);
class ProductData {
	public static $tablename = "product";

	public function ProductData(){
		$this->name = "";
		$this->description = "";
		$this->attribute = "";
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
		
		//Precio costo en Bsf
		$PrecioNeto = $this->price_in * $valor_dolar  ;
		//Cantidad de Ganancia en Dolar
		$PrecioGanciaDL = (($this->price_in * $pg) /100 );
		//Cantidad Ganancia en Bs
		$PrecioGanciaBs = ((($this->price_in * $pg) /100 ) * $valor_dolar ) ;
		//Precio venta en dolar
		$PrecioVentaDl = ((($this->price_in * $pg) /100 ) + $this->price_in )  ;	
		//Precio Venta en Bolivares
		$PrecioVentaBS = $PrecioNeto + $PrecioGanciaBs;

		$sql = "insert into ".self::$tablename." (barcode,name,description,attribute,price_in,price_out,price_out_bs,gain_dl,gain_bs,percentage,user_id,presentation,unit,category_id,inventary_min,is_bsf,created_at) ";
		$sql .= "value (\"$this->barcode\",\"$this->name\",\"$this->description\",\"$this->attribute\",\"$this->price_in\",\"$PrecioVentaDl\",\"$PrecioVentaBS\",\"$PrecioGanciaDL\",\"$PrecioGanciaBs\",\"$this->percentage\",$this->user_id,\"$this->presentation\",\"$this->unit\",$this->category_id,$this->inventary_min,\"$this->is_bsf\",NOW())";
		
		//echo $sql;
		//exit;
		return Executor::doit($sql);

	}
	//guardar imagenes
	public function add_images_product($fileName, $idproduct){
		
		$sql = "insert into images (image_name,id_product,created_at) ";
		$sql .= "value (\"$fileName\",$idproduct,NOW() )";
		//consulto si tiene imagen principal
		$imgppal = ProductData::getImagePrincipal($idproduct);
		$nombrefoto = $imgppal[0]->image;
		if ($nombrefoto == 'no_image.png') {
			$sql_foto_principal = "update ".self::$tablename." set image=\"$fileName\"  where id=$idproduct";
			Executor::doit($sql_foto_principal);
		}
		//echo $sql;
		//exit;		
		return Executor::doit($sql);
	}
	//Get imagen principal
	public static function getImagePrincipal($idproduct){
		$sql = "select image from ".self::$tablename."  where id=$idproduct";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function update(){
		$pg = $this->percentage;
		$divisas = DivisaData::getAll();
		
		//ultimo valor del dolar  
		$ultimo_elemento=count($divisas)-1; 
		$valor_dolar = ($divisas[$ultimo_elemento]->monto);
		
		//Precio costo en Bsf
		$PrecioNeto = $this->price_in * $valor_dolar  ;
		//Cantidad de Ganancia en Dolar
		$PrecioGanciaDL = (($this->price_in * $pg) /100 )  ;
		//Cantidad Ganancia en Bs
		$PrecioGanciaBs = ((($this->price_in * $pg) /100 ) * $valor_dolar ) ;
		//Precio venta en dolar
		$PrecioVentaDl = ((($this->price_in * $pg) /100 ) + $this->price_in )  ;	
		//Precio Venta en Bolivares
		$PrecioVentaBS = $PrecioNeto + $PrecioGanciaBs;

			$sql = "update ".self::$tablename." set barcode=\"$this->barcode\",name=\"$this->name\",description=\"$this->description\",attribute=\"$this->attribute\",price_in=\"$this->price_in\",price_out=\"$PrecioVentaDl\",price_out_bs=\"$PrecioVentaBS\",gain_dl=\"$PrecioGanciaDL\",gain_bs=\"$PrecioGanciaBs\",unit=\"$this->unit\",presentation=\"$this->presentation\",category_id=$this->category_id,inventary_min=\"$this->inventary_min\",is_active=\"$this->is_active\",is_bsf=\"$this->is_bsf\" where id=$this->id";
		
		//echo $sql;
		//exit;
		Executor::doit($sql);
	    
	}

	public function updatePriceOut($price){
		//busco los precios de los productos
		$products = ProductData::getAllActive();	

		foreach($products as $product):

		//porcentaje
		$pg = $product->percentage;
		//Valor del $
		$valor_dolar = $price;
		
		//Precio costo en Bsf
		$PrecioNeto = $product->price_in * $valor_dolar  ;
		//Cantidad de Ganancia en Dolar
		$PrecioGanciaDL = (($product->price_in * $pg) /100 )  ;
		//Cantidad Ganancia en Bs
		$PrecioGanciaBs = ((($product->price_in * $pg) /100 ) * $valor_dolar ) ;
		//Precio venta en dolar
		$PrecioVentaDl = ((($product->price_in * $pg) /100 ) + $product->price_in )  ;	
		//Precio Venta en Bolivares
		$PrecioVentaBS = $PrecioNeto + $PrecioGanciaBs;


		$finalPrice = ((($product->price_in * $pg) /100 ) + $product->price_in ) * $valor_dolar ;
			//echo $finalPrice ."<br>";
		//actualizo el precio salida
		

		$sql = "update ".self::$tablename." set price_out=\"$PrecioVentaDl\",price_out_bs=\"$PrecioVentaBS\",gain_dl=\"$PrecioGanciaDL\",gain_bs=\"$PrecioGanciaBs\" where id=$product->id;";

		Executor::doit($sql);
		endforeach;
		//echo $sql;
		//exit;
		
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
	//****DEL PRODUCTO AND IMAGES ****//
	//actualizar imagenes	
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	
	public function update_images_product($fileName, $idproduct){
		$sql = "insert into images (image_name,id_product,created_at) ";
		$sql .= "value (\"$fileName\",$idproduct,NOW() )";
		//echo $sql;
		//exit;		
		return Executor::doit($sql);
	}

	public static function getUrlImages($idimagenes){
		$sql = "select image_name from images where id in $idimagenes";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public function delImages($idimagenes){
		$sql = "delete from images where id in $idimagenes";
		/*echo $sql;
		exit;*/
		Executor::doit($sql);
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getCountAlertStock(){
	$sql = "select 	count(P.id) as total 
			FROM
			operation AS Op 
			RIGHT OUTER JOIN product AS P ON (Op.product_id = P.id) 
			LEFT OUTER JOIN  operation_type AS Opt ON (Op.operation_type_id = Opt.id) 
			INNER JOIN category AS C ON (P.category_id = C.id)
			WHERE  (CASE
			WHEN Opt.name  = 'entrada'
			THEN 'Entrada'
			WHEN Opt.name  IS NULL
			THEN 'Nuevo'
			END) <>'salida' ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getAllActive(){
		$sql = "select * from ".self::$tablename." where is_active=1 and is_bsf=0" ;
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
		$sql = "select * from ".self::$tablename." where UPPER(barcode) like UPPER('%$p%') or UPPER(name) like UPPER('%$p%') or id like '%$p%' OR UPPER(attribute) like UPPER('%$p%') ";
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
			$sql2 .= "('Reloj-Inteligente-Smart-Watch-dz09-Negro-V8-1.jpg',$idprod),"	;
		
		}
	endforeach;

	$sqlall = $sql . $sql2 ;
	$sql_final = substr($sqlall, 0, -1);
	echo $sql_final;
	//exit;
	Executor::doit($sql_final);	
	}

}

?>