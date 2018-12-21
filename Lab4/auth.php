<?php
	if (isset($_POST['login']) && isset($_POST['password']))
	{
	if (!empty($_POST['login']) && !empty($_POST['password']))
	{
		$login = clearData($_POST['login']);
			$password = md5(md5(clearData($_POST['password']).'salt'));  			
			$res = getOne("SELECT id from users where login='$login' and password='$password'");
			if (!empty($res)){
				$_SESSION['user_login'] = $login;
				$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
				header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				exit;
			}
			else 
			{
				var_dump($password);
				echo "<font color=red>Неверный логин или пароль!</font>";
			}
		}
	else echo "<font color=red>Заполните все поля!</font>";
	}		
	if (isset($_GET['logout'])) 
	{		
		session_destroy();
		header("Location: index.php");
		exit;
	}
	
	if (!isset($_SESSION['user_login']) and $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
	{
?>

<table class="content">
	<tr>
		<td>
			<h4>Вход в систему</h4>
			<form method="POST">
			<center>
					<table>
						<tr>
							<td>
								Логин:
							</td>
							<td>
								<input type="text" name="login" value="<?php echo $_GET['login']; ?>"><br>
							</td>
						</tr>
						<tr>
							<td>
								Пароль:
							</td>
							<td>
								<input type="password" name="password"><br>
							</td>
						</tr>	
						<tr>
							<td></td>
							<td>
								<p><input type="submit" value="Вход">&nbsp&nbsp<a href='index.php?page=reg'>Регистрация</a></p>
							</td>
						</tr>
					</table>	
				</center>
			</form>			
		</td>
	</tr>
</table>
<?php	
	}
?>