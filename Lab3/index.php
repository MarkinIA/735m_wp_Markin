<?php
	include_once "lib.inc.php";
	ini_set('session.save_path', getcwd());
	session_start();

	if (isset($_COOKIE['visitDate'])) {
		$visitDate = $_COOKIE['visitDate'];
	} else {
			setcookie('visitDate', date('Y-m-d H:i:s'), time()+0xFFFFFFF);
	}

	if(isset($_GET['command'])){
		if(!isset($_SESSION['user_login'])){
			if ($_GET['command'] != 'login') {
				$_SESSION['goal_url'] = $_SERVER['REQUEST_URI'];
				header("Location: index.php?command=login");
				exit;
			} 
		}
	}

		if(isset($_GET['command'])){
			if($_GET['command'] == 'logout'){
				session_destroy();
				header("Location: index.php");
				exit;
			}
		}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Университет - только вперед</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
<table class="table">
	<tr>
		<td align="center" colspan="2" >
		<!-- Верхняя часть сайта --> 
		<?php include "top.inc.php" ?>
		</td>
	</tr>
	<tr>
		 <td width="25%"  rowspan="1" >
		<!-- Меню сайта -->
			<?php include "menu.inc.php" ?>
		</td>
		<td colspan="2">

			<?php
			if(!empty($_GET['command'])){
				$command = $_GET['command'];
				switch($command)
				{	
				case 'login': include 'auth.php'; break;
				case 'lab1': include 'lab_Rab1.html'; break;
				case 'lab2': include 'lab_rab2.php'; break;
				case 'lab3': include 'lab_rab3.php'; break;				
				case 'catalog': include 'catalog.php'; break;	
				case 'add': include 'add.php'; break;
				case 'item': include 'item.php'; break;	
				case 'edit': include 'edit.php'; break;
				}
			} else { echo
				'<table class="content">
				<tr>
				<td>
				 </td>
					<td class="content_td"> 
					Добро пожаловать на сайт Университета!
					<br/>Уважаемые абитуриенты, мы рады приветствовать вас на нашем сайте. Для подачи заявки нажмите кнопку "Форма заявки абитуриента".
					</td>
					<p><img src="Pictures\1.png" class="view" alt="Интенсивное обучение"/> </p>
				</tr>
			</table>';
			}?>;
		</td>
	</tr>
	<tr>
		<td colspan="3">
		<!-- Нижняя часть сайта --> 
			<?php include "bottom.inc.php" ?>
		</td>
	</tr>
</table>
</body>
</html>
