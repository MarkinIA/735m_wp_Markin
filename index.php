<?php include "lib.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
			<table class="content">
				<tr>
				<td>
				 </td>
					<td class="content_td"> 
					Добро пожаловать на сайт Университета!
					<br/>Уважаемые абитуриенты, мы рады приветствовать вас на нашем сайте. Для подачи заявки нажмите кнопку "Форма заявки абитуриента".
					</td>
					<p><img src="Pictures\1.png" class="view" alt="Интенсивное обучение"/> </p>
				</tr>
			</table>
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
