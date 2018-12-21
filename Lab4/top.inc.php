 <table class="top">
				<tr>	
	
					<td> <p class="text-logotip"> Добро пожаловать на сайт Университета </p> </td>
				</tr>
				<tr>  
					<td colspan="2">  
    <?php
		if (!empty($_SESSION['user_login']))
			echo "Привет,<b>".$_SESSION['user_login']."</b> <a href='index.php?logout=true'>(Выход)</a>";
	?>  
		</td>   	 					
	  </tr>
</table>