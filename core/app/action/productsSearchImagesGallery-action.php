<?php
ini_set("display_errors", 1);
// define('LBROOT',getcwd()); // LegoBox Root ... the server root
//include("../../core/controller/Database.php");

if(!isset($_SESSION["user_id"])) {
$idproducto = $_POST['idproducto'];


echo '	<div class="item" id="'.$idproducto.'">
		<img class="thumbnail img-responsive" title="NOMBRE PRODCUTO" src="storage/products/smartwatch-DZ09-reloj-inteligente-sport-camara-sd-simcard-1.jpg" >
	</div>
<div class="item" id="'.$idproducto.'">
		<img class="thumbnail img-responsive" title="NOMBRE PRODCUTO" src="storage/products/smartwatch-v8-reloj-inteligente-sport-camara-sd-simcard-2.jpg" >
	</div>
	<div class="item" id="'.$idproducto.'">
		<img class="thumbnail img-responsive" title="NOMBRE PRODCUTO" src="storage/products/smartwatch-v8-reloj-inteligente-sport-camara-sd-simcard-3.jpg" >
	</div>


	';

/*$base = new Database();
$con = $base->connect();
print_r($con);
*/
//echo $idproducto;
/*$pass = sha1(md5($_POST['password']));

$base = new Database();
$con = $base->connect();
 $sql = "select * from user where (email= \"".$user."\" or username= \"".$user."\") and password= \"".$pass."\" and is_active=1";
//print $sql;
$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['id'];
}

if($found==true) {
//	session_start();
//	print $userid;
	$_SESSION['user_id']=$userid ;
//	setcookie('userid',$userid);
//	print $_SESSION['userid'];

	print "<script>window.location='index.php?view=home';</script>";
}else {
	print "<script>window.location='index.php?view=login';</script>";
}*/

}else{
	echo "vacio";
	
}
?>