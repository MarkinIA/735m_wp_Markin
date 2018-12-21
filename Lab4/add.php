<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{	
		if (!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['authors']) && !empty($_POST['amount']) && !empty($_POST['publishing']))
	{	
		$name = clearData($_POST['name']);
		$year = clearData($_POST['year']);
		$authors = clearData($_POST['authors']);
		$amount = clearData($_POST['amount']);
		$publishing = clearData($_POST['publishing']);
		$cheakID = getOne("SELECT id FROM tovar WHERE Name = '$Name' ");				
		if (count($cheakID) == 0)
		{
			if ($_FILES['uploadfile']['tmp_name']) 
			{			
				$a = loadImage("add"); // получаем массив , содержащий сообщение в случае ошибки и ссылку на изображение			
				if (empty($a['mess'])) 
				{
					$image = $a['src'];
					executeQuery("INSERT INTO tovar (name,year,authors,amount,publishing,image) VALUES ('$name','$year','$authors','$amount','$publishing','$image')");
					header("Location: index.php?page=catalog");
					exit;
				}
				else
				{ 
					echo $a['mess'];
				}
			}
			else 
			{			
				$image = "";
				executeQuery("INSERT INTO tovar (name,year,authors,amount,publishing,image) VALUES ('$name','$year','$authors','$amount','$publishing','$image')");	
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else echo  '<font color="red">Запись с таким названием уже существует!</font>';
	}
	else 
		echo '<font color="red">Заполните все поля!</font>';	
}
?>
<div>	
	<h3>Добавить запись</h3>
	<?php include "item_form.php"; ?>
</div>
