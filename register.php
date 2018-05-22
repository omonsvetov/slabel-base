<?php 

require_once 'init.php';

// информация которая пришла из формы
$user_array = handle_user_request();
// эта функция будет проверять как отправлен запрос, если не методом 
//POST значит юзер не логинился в первый раз зашел на страницу -- 
//будет возвращать нул. Иначе будет возвращать массив  name и password

if ($user_array) {// Развилка. если есть юзер_аррай те он не пустой
	register_user($user_array);
//то в регистрации вызовем функцию- сохранить пользователя -зарегистрировать пользователя
}


$render_content = function(){
	$submit_label = 'Register';
	include 'tpl/user_form.html';
};



require 'tpl/base.html';
 ?>