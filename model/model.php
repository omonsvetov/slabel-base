<?php 

$conn = mysqli_connect('localhost', 'root', '', 'slabel');

$model = [];
require MODEL_DIR . 'blog.php';

unset($conn); 
// что бы в не модели никто с базой работать не мог
 ?>