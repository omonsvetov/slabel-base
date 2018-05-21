<?php 

require_once 'init.php';

$user_array = handle_user_request();

if ($user_array) {
	login_user($user_array);//залогигим  пользователя
}

$render_content = function(){
	$submit_label = 'Login';
	include 'tpl/user_form.html';
};


require 'tpl/base.html';

 ?>