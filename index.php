<?php 

require_once 'init.php';

// ф-ция которая отвечает за отображение всего контента
$render_content = function(){
	global $conn;

	$get = $_GET;
	// var_export($_GET);
	// $query = '?';
	// foreach ($_GET as $key => $value) {
	// 	$query .= $key . '=' . $value . '&';
	// }
	// echo trim($query, '&');
	//echo http_build_query($_GET);// простой способ ))

	$category = isset($_GET['category']) ? $_GET['category'] : NULL;
	$maker = isset($_GET['maker']) ? $_GET['maker'] : NULL;
	$where_condition = [];
	
	if($category){
		$where_condition = " categories.name = '{$category}' ";

	} elseif($maker){
		$where_condition = " makers.name = '{$maker}' ";

	} 
	$final_condition = count($where_condition) ? 'WHERE' . imploed(' AND', $where_condition) : '' ;
	
	$items = mysqli_query($conn, "SELECT items.id AS id, model, image_path, catigories.name AS category, makers.name AS maker FROM items JOIN categories ON items.category_id = categories.id
			  JOIN makers ON items.maker_id = makers.id" . $final_condition); 
	

	include 'tpl/items.html';
};
// подключаем шаблон  base.html
require 'tpl/base.html';
 ?>