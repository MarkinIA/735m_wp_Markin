<?php
$id = clearData($_GET['id']);	
	$row = getOne("SELECT * FROM tovar WHERE id = '$id'");  // получаем всю информацию из tovar по данному id
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
		if (!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['authors']) && !empty($_POST['amount']) && !empty($_POST['publishing']))
		{	
			$name = clearData($_POST['name']);
			$year = clearData($_POST['year']);
			$authors = clearData($_POST['authors']);
			$amount = clearData($_POST['amount']);
			$publishing = clearData($_POST['publishing']);
			if ($_FILES['uploadfile']['tmp_name']) 
			{				
				$a = loadImage("edit"); // получаем массив , содержащий сообщение в случае ошибки и ссылку на изображение			
				if (empty($a['mess'])) 
				{				
					$image = $a['src'];
					executeQuery("UPDATE tovar SET name = '$name', year = '$year', authors = '$authors', amount = '$amount', publishing = '$publishing', image ='$image' WHERE id = '$id'");		
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
				executeQuery("UPDATE tovar SET name = '$name', year = '$year', authors = '$authors', amount = '$amount', publishing = '$publishing' WHERE id = '$id'");								
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else 
			echo '<font color="red">Заполните все поля!</font>';		
	}
?>
	
<div>
	<h3>Редактировать запись</h3>
	<?php include "item_form.php" ?>
</div>
