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

include 'tpl/header.html';

switch(TRUE){// совпаде с тем кейсом в котором будет true
	case preg_match('/^\/(|home)$/', $_SERVER['REQUEST_URI']):
	// если между началом сторки и концом ничего нет но есть слово home
		require 'logic/home.php';
		break;
	case preg_match('/^\/user$/', $_SERVER['REQUEST_URI']):
	// если начинается наша строка со слова user и им же заканчивается, подключить 
		require 'logic/user/user.php';
		break;
	default:// иначе (если мы не ожидали) вызвать 404 ошибку
		require 'logic/404.php';
		break;
}


include 'tpl/footer.html';

//var_export($parts)
 ?>

 