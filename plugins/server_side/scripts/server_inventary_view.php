<?php
ini_set("display_errors", 1);
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'product';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => '`p`.`id`',      'dt' => 0, 'field' => 'id', 'as' => 'id' ),
	array( 'db' => '`p`.`barcode`', 'dt' => 1, 'field' => 'barcode', 'formatter' => function( $d, $row ) {
				$buttons='<a title="Editar" href="index.php?view=editproduct&id=' . $row["id"] . '" class="btn btn-xs btn-warning">' . $row["barcode"] . ' </a>';
                return $buttons;
	}),	
	array( 'db' => '`p`.`name`',    'dt' => 2, 'field' => 'product_name', 'as' => 'product_name' ),
	array( 'db' => 'IFNULL(Op.q, 0)',   'dt' => 3, 'field' => 'cant', 'as' => 'cant	' ),
	array( 'db' => '`c`.`name`',     'dt' => 4, 'field' => 'category_name', 'as' => 'category_name' ),
	array( 'db' => 'CASE
				      WHEN IFNULL(Op.q, 0) = 0
				      THEN "Sin Stock"
				      WHEN IFNULL(Op.q, 0) <= P.inventary_min/2
				      THEN "Muy Poco Stock"
				      WHEN IFNULL(Op.q, 0) <= P.inventary_min
				      THEN "Poco Stock" 
    				END','dt' => 5, 'field' => 'status', 'as' => 'status' ),

	array( 'db' => '`p`.`id`', 'dt' => 6, 'field' => 'id', 'formatter' => function( $d, $row ) {
				
					return "<a href='index.php?view=input&product_id=$d' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-circle-arrow-up'></i> Alta</a><br>
					<a href='index.php?view=history&product_id=<?php echo $product->id; ?>' class='btn btn-xs btn-success'><i class='glyphicon glyphicon-time'></i> Historial</a>
					";
	}),	
);

// SQL server connection information
require('config.php');
$sql_details = array(
	'user' => $db_username,
	'pass' => $db_password,
	'db'   => $db_name,
	'host' => $db_host
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

// require( 'ssp.class.php' );
require('ssp.customized.class.php' );

$joinQuery = "FROM
    operation AS Op 
    RIGHT OUTER JOIN product AS P ON (Op.product_id = P.id) 
    LEFT OUTER JOIN  operation_type AS Opt ON (Op.operation_type_id = Opt.id) 
    INNER JOIN category AS C ON (P.category_id = C.id)";
$extraWhere = "(CASE
      WHEN Opt.name  = 'entrada'
      THEN 'Entrada'
      WHEN Opt.name  IS NULL
      THEN 'Nuevo'
    END) <>'salida'";
//$groupBy = "`u`.`office`";
//$having = "`u`.`salary` >= 140000";
//$extraWhere, $groupBy, $having
echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery,$extraWhere )
);
