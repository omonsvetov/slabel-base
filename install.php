<?php 
require "init.php";
// создадим скрипт который будет создавать б.д.
mysqli_query($conn, // к этому соединению выполнить следующий запрос
		"CREATE TABLE IF NOT EXISTS users(
		id INT PRIMARY KEY AUTO_INCREMENT, 
		name CHAR(20) UNIQUE NOT NULL, 
		pass CHAR(60), 
		is_admin BOOLEAN DEFAULT 0)"
	);

mysqli_query($conn, 
		"CREATE TABLE IF NOT EXISTS categories(
		id INT PRIMARY KEY AUTO_INCREMENT, 
		name CHAR(20) UNIQUE NOT NULL)"
	);

mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS makers(
		id INT PRIMARY KEY AUTO_INCREMENT, 
		name CHAR(20) UNIQUE NOT NULL)"
	);

mysqli_query($conn, // к этому соединению выполнить следующий запрос
		"CREATE TABLE IF NOT EXISTS items(
		id INT PRIMARY KEY AUTO_INCREMENT, 
		model CHAR(20) UNIQUE NOT NULL,
		image_path CHAR (255),
		maker_id INT,
		category_id INT )"
	);


 ?>