<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($_POST['password_main']) && !empty($_POST['password_confirm']) && !empty($_POST['login']) && !empty($_POST['email'])) 
        {
            if ($_POST['password_main'] == $_POST['password_confirm'])
            {           
                $password = md5(md5(clearData($_POST['password_main']).'salt'));   // хэшируем пароль 
                $login = clearData($_POST['login']);
                if (isset($_POST['email'])) $email = clearData($_POST['email']);               
                if (isset($_POST['phone'])) $phone = clearData($_POST['phone']);
                addUser($login, $password, $email, $phone);                       
            }
            else echo '<font color=red>Пароли не совпадают!</font>';
        }
        else echo '<font color=red>Заполните все обязательные поля!</font>';
    }
?>

<center>
	<table>
		<tr>
			<td>		
				<h2 align="center">Регистрация</h2>
				<form method="POST">
					<table>
						<tr style="height:30px;">
							<td>Логин <font color="red">*</font></td>
							<td><input type="text" name="login" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Пароль <font color="red">*</font></td>
							<td><input type="password" name="password_main" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Повторите пароль <font color="red">*</font></td>
							<td><input type="password" name="password_confirm" required></td>
						</tr>
						</tr>      
						<tr style="height:30px;">
							<td>Email <font color="red">*</font></td>
							<td><input type="text" name="email"></td>
						</tr>
						<tr style="height:30px;">
							<td>Телефон</td>
							<td><input type="text" name="phone" placeholder="+7(___)___-__-__"></td>
						</tr>
					</table>
					<p>
						<input type="submit" value="Сохранить">
						<input type="reset" value="Сброс">
					</p>
					<br>
					<font color="red">*</font> - Обязательные поля для заполнения
				</form>
			</td>
		</tr>
	</table>
</center>
