<?php include_once "lib.inc.php";
 
function reverse_string($string) {
    print $string?reverse_string(substr($string,1)).$string[0]:'';
}


function Sorted_array($arr)
{
	
$CountedArr = count($arr);

    for($i=0; $i < $CountedArr; $i++)
    {
        $small = $i;
        
        for($k=$i+1; $k < $CountedArr; $k++)
        {
            if($arr[$k] < $arr[$small])
            {
                $small = $k;
            }
        }
        
        $buf = $arr[$i];
        $arr[$i] = $arr[$small];
        $arr[$small] = $buf;
    }
	
for( $i = 0; $i < $CountedArr; $i++ )
   echo $arr[$i]."\n";
}?>

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
		<td colspan="2" >
		<h3>Задание 1</h3>
			<table>
				<tr>
				<h4>Функция перевернутой строки</h4>
						<form name="frames" method="POST">
								Строка:<br>
								<input type="text" value="" name="str" /><br /><br />
								<input type="submit" value="Перевернуть" />
							</form><br>
							Результат:
							<?php
							if (isset($_POST['str'])) 
							reverse_string($_POST['str'])
							?>
				</tr>
			</table>
			<h3>Задание 2</h3>
			<table>
			<tr>
				<h4>Сортировка</h4>
				<form name="frame" method="POST">
					Введите цифры: <br />
					<input type="text" value="" name="mass[]"><br>
					<input type="text" value="" name="mass[]"><br>
					<input type="text" value="" name="mass[]"><br>
				<input type="submit" value="Сортировать">
				</form><br>
			Результат:
			<?php
				if (isset($_POST['mass'])) 
				Sorted_array($_POST['mass'])
			?>
			</tr>
			</table>
</tr>	
</table>
</body>
</html>