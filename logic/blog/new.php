
<?php 
$additional_templates[] = TPL_DIR . 'blog/post_form.html';


// если метод запроса пост, а так же установдены переменные title и content
// if we wont to save new post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['content'])) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	// сделаем флаг
	$is_ok = TRUE; 
	// проверки
	// если длина нашего тайтла больше 50 символов
	if(strlen($title) > 50 ){
		$_SESSION['messages'][] = ['type' => 'warning', 'text' => 'Title is to long'];
		$is_ok = FALSE;// если произошла ошибка
	}
	if(strlen($content) < 3 ){
		$_SESSION['messages'][] = ['type' => 'warning', 'text' => 'Content is to short'];
		$is_ok = FALSE;
	}
	if ($is_ok) {// внутри нашей модели будет отдельный функционал который работает с блогом, и этот функционал-элемент будет представлять из себя массив функций
		$save_error = $model['blog']['save_post'] ($title, $content);
		if($save_error){// есл есть ошибка, создаем эту ошибку с текстом сэйв эрор
			$_SESSION['messages'][] = ['type' => 'danger', 'text' => '$save_error'];
		}else{
			header('Location: /blog/');
			exit();
		}
	}
}

 ?>
