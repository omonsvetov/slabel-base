<?php 
/*
	описание ф-ции
	какие аргументы принимает
	что возвращает
*/

// будет возвращать массив с информацией о юзере либо NULL если его нет
function handle_user_request(){
// делаем проверку
	if ($_SERVER ['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['password'])) {
	//если запрос сделан с помощью метода POST и если в нем есть пост_нэйм и пост_пассворд 
		return [ 
			'name' =>  $_POST['name'], 
			'pass' => $_POST['password']
		];
	}
	//иначе вернуть NULL
	return NULL;
}

function register_user($user_array){
	global $conn;
	$name = $user_array['name'];
	$is_admin = $name === 'admin' ? 1 : 0;
	$pass = password_hash($user_array['pass'], PASSWORD_DEFAULT );
 
		
	 mysqli_query($conn, //выполнить следующий запрос
	 	"INSERT INTO users(name, pass, is_admin) VALUES('{$name}', '{$pass}', '{$is_admin}' )");
	 //если нет ошибок
	 if(!mysqli_error($conn)){
	 	login_user([
	 			'name' => $name, 
				'pass' => $user_array['pass']
	 	]);
	 }else{
	 	echo mysqli_error($conn);
	 }
}


function login_user($user_array){
	global $conn;
	// если у нас нет пользователя - ошибка такого пользователя не существует
	// если пользователь есть сравниваем его значение с полем пароль с помощью ф-ции password_verify, если совпадают логиним
	// иначе ошибка - неверный пароль
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE name = '{$user_array['name']}' "));//получили имя пользователя
	// если есть совпадения то ето тот же юзер
	if ($user && password_verify($user_array['pass'], $user['pass'])) {
		//добавить 1 элемент в этот массив равный массиву
		$_SESSION['messages'][] = ['success', 'You are successfully logged in'];

	// удаляем из массива юзеров хеш пароля (на всякий случай) 
		unset($user['pass']);
		// и записываем это значение в сесию
		$_SESSION['user'] = $user;  
		header('Location: /');
		exit();
	}
}

function logout_user(){
	//session_destroy();// удалить всю информацию пользователя
	unset($_SESSION['user']);
	$_SESSION['messages'][] = ['success', 'You are logged out'];
	header('Location: /');
	exit();
}

?>