<?php 
function getMenu($menu, $vertical=true) 
{ 
$style = "";
if(!$vertical) 
{ 
$style = "display:inline"; 
} 
echo '<ul style="list-style-type:none">'; 
foreach ($menu as $link=>$href) 
{ 
echo "<li style='$style'><a class = 'a' href=\"$href\">", $link, '</a></li>'; 
} 
echo '</ul>';
}

function clearData($data)
	{
		return trim(strip_tags($data));
	}

    function imageCheck($img)
    {
        if ($img['type'] == "image/jpeg")
        {
            if ($img['size']<=1024000)
                return 1;
            else
                return "Размер файла не должен превышать 1000Кб!";
        }
        else
            return "Файл должен иметь jpeg-расширение!";
    }

function resize($file)
{
    global $tmp_path;
    // Ограничение по ширине в пикселях
    $max_size = 250;
    // Cоздаём исходное изображение на основе исходного файла
    $src = imagecreatefromjpeg($file['tmp_name']);
    // Определяем ширину и высоту изображения
    $w_src = imagesx($src);
    $h_src = imagesy($src);
    // Если ширина больше заданной
    if ($w_src > $max_size)
    {
        // Вычисление пропорций
        $ratio = $w_src/$max_size;
        $w_dest = round($w_src/$ratio);
        $h_dest = round($h_src/$ratio);
        // Создаём пустую картинку
        $dest = imagecreatetruecolor($w_dest, $h_dest);
        // Копируем старое изображение в новое с изменением параметров
        imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
        // Вывод картинки и очистка памяти
        imagejpeg($dest, $tmp_path . $file['name']);
        imagedestroy($dest);
        imagedestroy($src);
        return $file['name'];
    }
    else
    {
        // Вывод картинки и очистка памяти
        imagejpeg($src, $tmp_path . $file['name']);
        imagedestroy($src);
        return $file['name'];
    }
}

$connect = false;
	function connectDB(){   // функция подключения к БД
		global $connect;
		$host = "127.0.0.1";
		$user = "root";
		$password = "";
		$database = "University";
		$connect = mysqli_connect($host,$user,$password,$database) or die("Не удалось подключиться к БД"); // подключение к базе данных			
		/* изменение набора символов на utf8 */
		mysqli_set_charset($connect,"utf8");
	}
	
	function getOne($query){ // функция получения одной записи из БД
		global $connect;
		connectDB();
		$result_set = mysqli_query($connect,$query) or die("Ошибка " . mysqli_error($connect));;
		closeDB();
		return $result_set->fetch_assoc();
	}	
	
	
	function getAll($query){ // функция получения нескольких записей из БД
		global $connect;
		connectDB();
		$result_set = mysqli_query($connect,$query) or die("Ошибка " . mysqli_error($connect));;
		closeDB();
		return resultSetArray($result_set);
	}
	
	function executeQuery($query){  // функция выполнения запросов, которые не возвращают данные (INSERT,UODATE,DELETE и т.д)
		global $connect;
		connectDB();
		$result_set = mysqli_query($connect,$query) or die("Ошибка " . mysqli_error($connect));;
		closeDB();		
	}	
	
	function resultSetArray($result_set){  // функция преобразования полученных данных из БД в ассоциативный массив
		$array =array();
		while (($row = $result_set->fetch_assoc()) !=false)
			$array[] = $row;
		return $array;
	}	
	
	
	function closeDB() {  // закрытие соединения с БД
		global $connect;
		mysqli_close($connect);
	}   
	
	
	function addUser($login,$password,$email,$phone){  // функция добавления пользователя в таблицу users
		global $connect;
		connectDB();		
		$query ="SELECT id FROM users where login = '$login' or email = '$email'";		// проверяем нет ли в таблице пользователя с таким логином или емаилом
		$result = getOne($query);
		if(!empty($result))
		{		
			echo "<font color=red>Пользователь с таким логином или email уже существует!</font>";
		}
		else 
		{
			$query ="INSERT INTO users (login,password,email,phone) VALUES ('$login','$password','$email','$phone')";			
			executeQuery($query);
			header("Location: index.php?login=".$login); 			
		}
		// закрываем подключение
		closeDB();			
	}
	
	function login($login,$password){
		global $connect;
		connectDB();
		
	}
?>