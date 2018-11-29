 <table class="top">
				<tr>	
	
					<td> <p class="text-logotip"> Добро пожаловать на сайт Университета </p> </td>
				</tr>
				<tr>  
					<td colspan="2">  
    <?php
		if (!empty($_SESSION['user_login'])){
            echo "<b>{$_SESSION['user_login']}</b> <a href='index.php?command=logout'>(Выход)</a>";
        } else {
            echo "User unlogged!";
        }	?>  
					</td>   	 					
	  </tr>
			</table>