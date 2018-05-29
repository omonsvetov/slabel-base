<?php 
//echo $_SERVER['REQUEST_URI'];// определяут путь

//preg_match_all('/\/(\w+)/', $_SERVER['REQUEST_URI'], $parts);
//разбить наше выражение по следующей структуре... 
//слеш после которого идут одна или несколько букв либо цифр
// и все совпадения записать в массив $parts

//$parts = $parts[1];
// нам нужны выражения которые находятся в 1-ой подмаске

//$parts = explode('/', trim ($_SERVER['REQUEST_URI'], '/')); 
// разобьем эту строку по всем случаям вхождения слеша

//array_shift($parts);
// удалить первый элемент массива, либо с помощью trim

require 'base/init.php';

$additional_templates = [];
// создадим массив в котором будут перечислены все шаблоны которые нам надо подключить

switch(TRUE){// совпаде с тем кейсом в котором будет true
	case preg_match('/^\/(|home)$/', $_SERVER['REQUEST_URI']):
	// если между началом сторки и концом ничего нет но есть слово home
		require LGC_DIR . 'home.php';
		break;
	case preg_match('/^\/user$/', $_SERVER['REQUEST_URI']):
	// если начинается наша строка со слова user и им же заканчивается, подключить 
		require LGC_DIR . 'user/user.php';
		break;
	case preg_match('/^\/blog$/', $_SERVER['REQUEST_URI']):
		require LGC_DIR . 'blog/blog.php';
		break;
	case preg_match('/^\/blog\/(\w+)$/', $_SERVER['REQUEST_URI'], $post_data):
		require LGC_DIR . 'blog/blog_item.php';
		break;
	case preg_match('/^\/blog\/(\w+)\/update$/', $_SERVER['REQUEST_URI'], $post_data):
		require LGC_DIR . 'blog/blog_item_update.php';
		break;
	case preg_match('/^\/blog\/new-post$/', $_SERVER['REQUEST_URI'], $post_data):
		require LGC_DIR . 'blog/new.php';
		break;
	default:// иначе (если мы не ожидали) вызвать 404 ошибку
		require LGC_DIR . '404.php';
		break;
}


include TPL_DIR . 'header.html';


foreach ($additional_templates as $template) {
	require $template;
}

include TPL_DIR . 'footer.html';

//var_export($parts)
 ?>

 