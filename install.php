<?php 

// создадим скрипт который будет создавать б.д.
mysqli_query($conn, // к этому соединению выполнить следующий запрос
		"CREATE TABLE IF NOT EXISTS users(
		id INT PRIMARY KEY AUTO_INCREMENT, 
		name CHAR(20) UNIQUE NOT NULL, 
		pass CHAR(60), 
		is_admin BOOLEAN DEFAULT 0)"
	);
echo mysqli_error($conn);

 ?>