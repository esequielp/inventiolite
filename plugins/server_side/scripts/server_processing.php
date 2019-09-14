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
	array( 'db' => '`p`.`image`', 'dt' => 0, 'field' => 'image', 'formatter' => function( $d, $row ) {
		return '<a href="#" title="Galeria"><img class="thumbnail img-responsive" id="' . $row["id"] . '" src="storage/products/'.$d.'"  style="width:64px;" ></a>';
	}),
	array( 'db' => '`p`.`barcode`', 'dt' => 1, 'field' => 'barcode', 'formatter' => function( $d, $row ) {
				$buttons='<a title="Editar" href="index.php?view=editproduct&id=' . $row["id"] . '" class="btn btn-xs btn-warning">' . $row["barcode"] . ' </a>';
                return $buttons;
	}),		

	array( 'db' => '`p`.`name`',     'dt' => 2, 'field' => 'product_name', 'as' => 'product_name' ),
	array( 'db' => '`p`.`description`',   'dt' => 3, 'field' => 'description' ),
	array( 'db' => '`p`.`attribute`',   'dt' => 4, 'field' => 'attribute' ),
	array( 'db' => '`c`.`name`',     'dt' => 5, 'field' => 'category_name', 'as' => 'category_name' ),
	array( 'db' => '`p`.`price_in`', 'dt' => 6, 'field' => 'price_in', 'formatter' => function( $d, $row ) {
				return '$' . number_format($d,2,'.',',');
	}),
	array( 'db' => '`p`.`price_out`', 'dt' => 7, 'field' => 'price_out', 'formatter' => function( $d, $row ) {
				return '$' . number_format($d,2,'.',',');
	}),
	array( 'db' => '`p`.`price_out_bs`', 'dt' => 8, 'field' => 'price_out_bs', 'formatter' => function( $d, $row ) {
				return 'Bs.' . number_format($d,2,'.',',');
	}),
	array( 'db' => '`p`.`gain_dl`', 'dt' => 9, 'field' => 'gain_dl', 'formatter' => function( $d, $row ) {
				return '$' . number_format($d,2,'.',',');
	}),	
	array( 'db' => '`p`.`gain_bs`', 'dt' => 10, 'field' => 'gain_bs', 'formatter' => function( $d, $row ) {
				return 'Bs' . number_format($d,2,'.',',');
	}),

	array( 'db' => '`p`.`percentage`', 'dt' => 11, 'field' => 'percentage', 'formatter' => function( $d, $row ) {
					return number_format($d,2,'.',','). '%';
		}),
	array( 'db' => '`p`.`unit`',     'dt' => 12, 'field' => 'unit' ),
	array( 'db' => '`p`.`presentation`',     'dt' => 13, 'field' => 'presentation' ),
	array( 'db' => '`p`.`inventary_min`',     'dt' => 14, 'field' => 'inventary_min' ),

	array( 'db' => '`p`.`is_active`', 'dt' => 15, 'is_active' => 'image', 'formatter' => function( $d, $row ) {
		return '<a title="Activar/Desactivar" href="index.php?view=editproduct&id=' . $row["id"] . '" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i></a>';
	}),
	array( 'db' => '`p`.`created_at`', 'dt' => 16, 'field' => 'created_at', 'formatter' => function( $d, $row ) {
				return date( 'd/m/Y', strtotime($d));
	}),
	array( 'db' => '`p`.`id`', 'dt' => 17, 'field' => 'id', 'formatter' => function( $d, $row ) {
				$buttons='<a title="Editar" href="index.php?view=editproduct&id=' . $row["id"] . '" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a title="Eliminar" href="index.php?view=delproduct&id=' . $row["id"] . '" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		<a title="Duplicar" class="btn btn-xs btn-info clone" id=' . $row["id"] . '"><i class="glyphicon glyphicon-file"></i></a>';
                return $buttons;
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

$joinQuery = "FROM `product` AS `p` JOIN `category` AS `c` ON (`p`.`category_id` = `c`.`id`)";
//$extraWhere = "`u`.`salary` >= 90000";
//$groupBy = "`u`.`office`";
//$having = "`u`.`salary` >= 140000";
//$extraWhere, $groupBy, $having
echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
);
