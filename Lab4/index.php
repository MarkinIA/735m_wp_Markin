<?php
	session_start();
	ob_start();
	ini_set('display_errors',1);
	//error_reporting(E_ALL);
	date_default_timezone_set('Asia/Muscat');
	header("Content-Type: text/html; charset=utf-8");
	header("Cache-control: no-store");
	include "base_reg.php";
	include "lib.inc.php";
	if (isset($_COOKIE['dateVisit']))
		$dateVisit = $_COOKIE['dateVisit'];
	setcookie('dateVisit',date('Y-m-d H:i:s'),time()+0xFFFFFFF);
	if (empty($_GET['page']))
		$page = "";
	else
		$page = $_GET['page'];
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Университет - только вперед</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
	<table class="header">
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
		<td>
				<table class="content">
					<tr>
						<td class="content_td">
			<?php
				if ($page=="reg")
					require 'registration.php';	
				else
					require 'auth.php';								
				if (isset($_SESSION['user_login']))	
				{									
					if (empty($page)) {
				echo
				'<tr>
					Добро пожаловать на сайт Университета!
					<br/>Уважаемые абитуриенты, мы рады приветствовать вас на нашем сайте. Для подачи заявки нажмите кнопку "Форма заявки абитуриента".
					<p><img src="Pictures\1.png" class="view" alt="Интенсивное обучение"/> </p>
				</tr>';
				}
				else 
				{ 
					switch($page)
					{	
						case 'login': include 'auth.php'; break;
						case 'lab1': include 'lab_Rab1.html'; break;
						case 'lab2': include 'lab_rab2.php'; break;
						case 'lab3': include 'lab_rab3.php'; break;
						case 'lab4': include 'lab_rab4.php'; break;						
						case 'catalog': include 'catalog.php'; break;	
						case 'add': include 'add.php'; break;
						case 'item': include 'item.php'; break;	
						case 'edit': include 'edit.php'; break;
					} 
				}
			}
			?>;
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
<?php
	ob_end_flush();
?>
