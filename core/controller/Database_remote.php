<?php
class Database {
	public static $db;
	public static $con;
	function Database(){
		$this->user="epiz_24421661";$this->pass="LMxpVlXCrsM30T";$this->host="sql213.epizy.com";$this->ddbb="epiz_24421661_inventio";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		$con->query("set sql_mode=''");
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
