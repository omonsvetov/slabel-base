<?php 

require_once 'init.php';

// информация которая пришла из формы
$user_array = handle_user_request();
// эта функция будет проверять как отправлен запрос, если методом 
//гет значит юзер не логинился. первый раз зашел на страницу будет 
//возвращать нул. Иначе будет возвращать массив  name b password

if ($user_array) {// если есть юзер_аррай те он не пустой
	register_user($user_array);//регистрируем пользователя
}


$render_content = function(){
	$submit_label = 'Register';
	include 'tpl/user_form.html';
};



require 'tpl/base.html';
 ?>