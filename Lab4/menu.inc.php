<?php 
$menu = array( 
"Главная страница"=>"index.php", 
"Работа №1"=>"index.php?page=lab1", 
"Работа №2"=>"index.php?page=lab2",
"Работа №3"=>"index.php?page=lab3",
"Работа №4"=>"index.php?page=lab4",
"Каталог"=>"index.php?page=catalog"); 
?> 


<table class="menu">
<tr>
<td class="menu_td">  
<?php 
getMenu($menu); 
?> 	
</td>
</tr>
</table>
			
