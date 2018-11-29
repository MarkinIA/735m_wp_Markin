<?php 
  if ( !empty($_POST)){
         	     $fio ='';
				 $age =0;
				 $zp =0;
				 $srok =0;
				 $pr  =0;
				 $sum  = 0;
				 $odobrenie ='нет';
				 $itogo =0 ;
				 $mecsum   = 0;

				 $fio =$_POST['fio'];
				 $age =$_POST['age'];
				 $zp =$_POST['zp'];
				 $srok =$_POST['srok'];
				 $pr  =$_POST['pr'];
				 $sum  = $_POST['sum'];

                if( $age > 20 and $age < 50  ){ 
					   
                      $itogo = $sum / 100  * $pr  + $sum;

					  $mecsum = $itogo / $srok;
                      
					  if ( $mecsum < $zp  ) {
                                $odobrenie ='одобрено'; 
					  }
				}
   }
 ?>

<link rel="stylesheet" type="text/css" href="style.css">

<table class="table">
<tr>
		<td colspan="2">
					<p>Определить возможность определение кредита</p>
			   <form  method="POST" >
                      <input type="" name="fio" value=""  placeholder= "фио">	 <br>
					    <input type="" name="age" value="" placeholder= "возраст">   <br>
						
						  <input type="" name="zp" value="" placeholder= "Зарплата">  <br>
						   	 <input type="" name="srok" value="" placeholder= "Срок месяц"> 	 <br>
								<input type="" name="pr" value="" placeholder= "процент"> 	 <br>
								<input type="" name="sum" value="" placeholder= "сумма">     <br>
								<input type="submit" name="" value="посчитать">
			   </form>
		</td>
<td colspan="2">
			  <?php 
			  if(!empty($_POST)){
				echo " <table border=1>
                      	  <tr>
					  <td>ФИО   </td>
					  <td>          ".$fio."	</td>
				  </tr>	
					  	  <tr>
					  <td>возраст  </td>
					  <td>  	 ".$age."	</td>
				  </tr>	
					  	  <tr>
					  <td>Зарплата  </td>
					  <td> 	 ".$zp."	</td>
				  </tr>	
					  	  <tr>
					  <td>Срок	   </td>
					  <td>     ".$srok."	</td>
				  </tr>	
					  	  <tr>
					  <td>процент	</td>
					  <td>    ".$pr."	</td>
				  </tr>	
					  	  <tr>
					  <td>сумма	   </td>
					  <td>     ".$sum."	</td>
				  </tr>	
					  	  <tr>
					  <td>одобрено </td>
					  <td> 	".$odobrenie."	</td>
				  </tr>	
					  	  <tr>
					  <td>итого    </td>
					  <td>     ".$itogo."	</td>
				  </tr>	
					  	  <tr>
					  <td>плата каждый месяц</td>
					  <td>	".$mecsum."	</td>
				  </tr>	

					  	  </table>  " ;
			  }
			   ?>
		</td>
	</tr>
</table>