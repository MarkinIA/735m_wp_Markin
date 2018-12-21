<?php
	
	function get_column_names_with_meta ($conn_id)
	{
		$query = "SELECT * FROM Student,Ankets WHERE 1 = 0";
		if (!($result_id = mysqli_query ($conn_id,$query)))
			return (FALSE);
		echo "<table border='1' align='center'>";
		echo "<tr><th>Таблица</th><th>Поле</th><th>Тип</th><th>Длинна</th></tr>";
		for ($i = 0; $i < mysqli_num_fields ($result_id); $i++)
		{
			if ($field = mysqli_fetch_field ($result_id))
				echo "<tr>";
				echo "<td>".$field->table."</td>";
				echo "<td>".$field->name."</td>";
				echo "<td>".$field->type."</td>";
				echo "<td>".$field->length."</td>";
				echo "</tr>";
		}
		echo "</table>";
		mysqli_free_result ($result_id);
	}	
	
	
	function insertDataAndView($connect)
	{
		mysqli_query($connect,"INSERT INTO Student (name,address,telephone,email) values ('Иванов И.И.','Рязанская область, г. Рязань, ул.Ленина','8-(888)-791-10-01 ','ubitobek-3271@yopmail.com')");
		mysqli_query($connect,"INSERT INTO Student (name,address,telephone,email) values ('Петров П.П.','Нижегородская область, г. Нижний Новгород, ул. Зайцева, 31','8-(888)-891-12-05','izemujydde-4056@yopmail.com') ");
		mysqli_query($connect,"INSERT INTO Student (name,address,telephone,email) values ('Максимов М.М.','г. Санкт-Петербург, пос. Шушары, Московское шоссе, 177а','8-(888)-911-14-10','zettoppugod-1203@yopmail.com') ");
		mysqli_query($connect,"INSERT INTO Student (name,address,telephone) values ('Акулов А.А.','Самарская область, г. Тольятти, ул. Вокзальная, 37',' 8-(888)-691-10-01', 'erywumo-2939@yopmail.com') ");
		mysqli_query($connect,"INSERT INTO Student(name,address,telephone,email) values ('Человеков Ч.Ч.','Республика Мордовия, г. Саранск, ул. Строительная, 11','8-(888)-491-10-01 ','wommyqitumm-7992@yopmail.com') ");
		
		$rows = resultSetArray(mysqli_query($connect,"SELECT * FROM Student ORDER BY id ASC"));			
		echo "<br>Таблица Student:<br>";		
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>ID</th><th>ФИО</th><th>Адрес</th><th>Номер</th><th>email</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['id']."</td>";
			echo "<td>".$item['name']."</td>";
			echo "<td>".$item['address']."</td>";
			echo "<td>".$item['telephone']."</td>";
			echo "<td>".$item['email']."</td>";
			echo "</tr>";
		}
		echo "</table><br>";
		
		mysqli_query($connect,"INSERT INTO Ankets (id_student,speciality,document,data,points) values ('1','АСУ','Паспорт','2018.02.03',185)");
		mysqli_query($connect,"INSERT INTO Ankets (id_student,speciality,document,data,points) values ('2','Математика','Паспорт','2018.02.03',300)");
		mysqli_query($connect,"INSERT INTO Ankets (id_student,speciality,document,data,points) values ('3','ИВТ','Паспорт','2018.02.05',210)");
		mysqli_query($connect,"INSERT INTO Ankets (id_student,speciality,document,data,points) values ('4','ПИ','Свидетельство о рождении','2018.02.10',220)");
		
		$rows = resultSetArray(mysqli_query($connect,"SELECT * FROM Ankets ORDER BY id ASC"));			
		echo "<br>Таблица Ankets:<br>";		
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>ID студента</th><th>Направление</th><th>Документы</th><th>Дата подачи</th><th>Количество баллов</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['id_student']."</td>";
			echo "<td>".$item['speciality']."</td>";
			echo "<td>".$item['document']."</td>";
			echo "<td>".$item['data']."</td>";
			echo "<td>".$item['points']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
	function query1($connect)
	{
		echo "<br><b>Запрос №1:</b> Вывести все заявки студентов, отсортированные по дате по возрастанию<br>";
		$rows = resultSetArray(mysqli_query($connect,"SELECT name,speciality,data,points FROM Ankets LEFT JOIN Student on Student.id = Ankets.id_student 
														ORDER BY data ASC"));			
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>ФИО</th><th>Специальность</th><th>Дата</th><th>Баллы</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['name']."</td>";
			echo "<td>".$item['speciality']."</td>";
			echo "<td>".$item['data']."</td>";
			echo "<td>".$item['points']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
	}
	
	function query2($connect)
	{
		echo "<br><b>Запрос №1:</b> Вывести общую сумму баллов у всех абитуриентов<br>";		
		$rows = resultSetArray(mysqli_query($connect,"SELECT sum(points) as 'it_sum' FROM Ankets"));			
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>Сумма</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['it_sum']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	
	function delDB($connect){
		$query = 'DROP DATABASE lab4';
		if (mysqli_query($connect,$query)) {
			echo "<br>База lab4 успешно удалена\n";
		} else {
			echo 'Ошибка при удалении базы данных: ' . mysqli_error() . "\n";
		}		
		mysqli_close($connect);
	}
	
	
	$host = "localhost";
	$users = "root";
	$password = "";
	$database = "lab4";	
	$connect = mysqli_connect($host, $user, $password);	
	if (!$connect) {
		die('Ошибка соединения: ' . mysqli_error($connect));
	}	
	
	
	
	$query = "CREATE DATABASE IF NOT EXISTS lab4 ";
	if (mysqli_query($connect,$query)) {
		echo "База '$database' успешно создана <br>";
	} else {
		echo 'Ошибка при создании базы данных: ' . mysqli_error($connect) . "\n";
	}
	
	mysqli_select_db($connect,$database);
	
	$query = "CREATE TABLE IF NOT EXISTS Student (
        id integer not null auto_increment primary key,
        name varchar(65) not null,
        address varchar(75) not null,
        telephone varchar(20))";
	
	if (mysqli_query($connect,$query)) {
		echo "Таблица Student успешно создана <br>";
	} else {
		echo 'Ошибка при создании таблицы Student: ' . mysqli_error($connect) . "\n";
	}
	
	$query = "CREATE TABLE IF NOT EXISTS Ankets (
        id integer not null auto_increment primary key,
		id_student integer not null,
        speciality varchar(65) not null,
        document varchar(65) not null)";
	
	if (mysqli_query($connect,$query)) {
		echo "Таблица Ankets успешно создана <br>";
	} else {
		echo 'Ошибка при создании таблицы Ankets: ' . mysqli_error($connect) . "\n";
	}	
	
	echo "<br>Структура базы данных";
	get_column_names_with_meta($connect);    // выводим структуру БД до изменения
	echo "<br><br>";
	
	$query = "ALTER TABLE Student ADD email varchar(50)";	
	if (mysqli_query($connect,$query)) {
		echo "Структура таблицы Student успешно изменена\n";
	} else {
		echo 'Ошибка при изменении таблицы Student: ' . mysqli_error($connect) . "\n";
	}	
	echo "<br><br>";
	
	$query = "ALTER TABLE Ankets MODIFY speciality varchar(50) not null,MODIFY document varchar(40)not null, ADD data date not null, ADD points double not null";	
	if (mysqli_query($connect,$query)) {
		echo "Структура таблицы Ankets успешно изменена\n";
	} else {
		echo 'Ошибка при изменении таблицы Ankets: ' . mysqli_error($connect) . "\n";
	}	
	
	echo "<br><br>Измененная структура базы данных";
	get_column_names_with_meta($connect);	         // выводим структуру БД после изменения
	insertDataAndView($connect);                     // заполняем таблицы и выводим их
	query1($connect);                                // запрос №1
	query2($connect);                                // запрос №2
	delDB($connect);                                         //удаляем базу данных lab4


?>
