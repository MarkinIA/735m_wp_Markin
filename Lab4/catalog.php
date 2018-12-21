<?php
	if (isset($_POST['add'])) header("Location: index.php?page=add");
?>
<div style="width:800px">
	<center><h2>Каталог</h2></center>		
	<form action="index.php?page=catalog" method="POST">
		<input type="submit" name="add" value="Добавить">
		<input type="submit" name="del" value="Удалить">	
		<br><br>
		<?php	  
		if	(isset($_POST['del'])){	
			if (!empty($_POST['delId'])){			    
				foreach($_POST['delId'] as $val)
				{
					executeQuery("DELETE FROM tovar WHERE id = '$val'"); // удаляем записи из таблицы tovar
					@unlink('images/catalog/'.$val.'.jpg');   					
				}
			}
			else echo "<font color='red'>Сначала отметьте записи, которые необходимо удалить!</font>";
		}
		?>		
		<br>
		<table class="content" border="1">
			<tr>
				<th></th>
				<th>Наименование</th>
				<th>Год выпуска</th>				
				<th>Разработчики</th>
			<tr>			
			<?php
				$rows = getAll("SELECT id,name,year,authors FROM tovar ORDER BY id ASC");  // получаем все записи из таблицы tovar
				if (!empty($rows)){
					foreach($rows as $item)
					{
						echo "<tr>";						
						echo "<td width='10px'><input type='checkbox' name='delId[]' value=".$item['id']."></td>";
						echo "<td><a href='index.php?page=item&id=".$item['id']."'>".$item['name']."</a></td><td>".$item['year']."</td><td>".$item['authors']."</td>";
						echo "</tr>";
					}
				}
			?>
		</table>
</form>
</div>