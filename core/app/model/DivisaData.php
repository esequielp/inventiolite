<?php
//ini_set("display_errors", 1);
class DivisaData {
	public static $tablename = "divisa";



	public function DivisaData(){
		$this->monto = "";
		$this->fuente = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into divisa (monto,fuente,created_at) ";
		$sql .= "value (\"$this->monto\",\"$this->fuente\",$this->created_at)";
		
		Executor::doit($sql);
		//ACTUALIZO LOS PRECIOS DE LOS PRODUCTOS
		$priceOut = ProductData::updatePriceOut($this->monto);
		echo $priceOut;
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto DivisaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set monto=\"$this->monto\",fuente=\"$this->fuente\" where id=$this->id";
		Executor::doit($sql);
		//ACTUALIZO LOS PRECIOS DE LOS PRODUCTOS
		$priceOut = ProductData::updatePriceOut($this->monto);		
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new DivisaData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->monto = $r['monto'];
			$data->fuente = $r['fuente'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getLast(){
		$sql = "select * from ".self::$tablename ." ORDER BY created_at DESC LIMIT 1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DivisaData());

	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where fuente like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DivisaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->fuente = $r['fuente'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>