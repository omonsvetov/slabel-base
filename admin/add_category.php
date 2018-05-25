<?php  
require_once '../init.php';

$user_array = handle_user_request();

only_for_admin();


$render_content = function(){
	$category = get_name_from_post();// логика категории
	if ($category !== NULL) {
		save_category($category);
	} 
	
	include '../tpl/category_form.html';
};


require '../tpl/base.html';
?>