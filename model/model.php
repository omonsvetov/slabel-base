<?php 

$conn = mysqli_connect('localhost', 'root', '', 'slabel');
$model = [];

unset($conn); 
// что бы в не модели никто с базой работать не мог
 ?>