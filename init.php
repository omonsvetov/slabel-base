<?php  
//здесь будет описана логика 


session_start();
// соединимся с локолхостом под пользователем рут  без пароля к базе slabel 
$conn = mysqli_connect('Localhost', 'root', '', 'slabel');
/*function create_connection(){// фция замыкания
	$conn = mysqli_connect('Localhost', 'root', '', 'slabel');

	//Создаем анонимную ф-циюю. 
	//с помощью use принимем аргументы из родительской области видимости
	$get_connection = function() use($conn){
		return $conn;
	};
	return $get_connection;
}
//  в рез - те здесь мы имеем ф-цию которая возвращает коннект с базой данных. 
//т.к. она вызывается из нутри фции то доступ к ней извне закрыт 
$GET_CONN = create_connection();
*/
// создадим переменную user  которая будет равна (если в сесии есть user ) непосредственно этому значению иначе NULL
$user = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

//include 'tpl/base.html';

// в результате ф-ции которые определены в этом файле
// будут доступны во всем коде который подключает init.php
require 'functions.php';
?>


