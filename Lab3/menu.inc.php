
	  
	  <?php 
$menu = array( 
"Главная страница"=>"index.php", 
"Работа №1"=>"index.php?command=lab1", 
"Работа №2"=>"index.php?command=lab2",
"Работа №3"=>"index.php?command=lab3",
"Каталог"=>"index.php?command=catalog"); 
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
			
