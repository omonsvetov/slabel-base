<?php  
//здесь будет описана логика 


session_start();
// соединимся с локолхостом под пользователем рут  без пароля к базе slabel 
$conn = mysqli_connect('Localhost', 'root', '', 'slabel');

// создадим переменную user  которая будет равна (если в сесии есть user ) непосредственно этому значению иначе NULL
$user = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

include 'tpl/base.html';

?>


