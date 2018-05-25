<?php  
require_once '../init.php';

$user_array = handle_user_request();

only_for_admin();


$render_content = function(){
	$maker = get_name_from_post();// логика категории
	if ($maker !== NULL) {
		save_maker($maker);
	} 
	
	include '../tpl/category_form.html';
};


require '../tpl/base.html';
?>