<?php 
function getMenu($menu, $vertical=true) 
{ 
$style = ' ';
if(!$vertical) 
{ 
$style = "display:inline"; 
} 
echo '<ul style="list-style-type:none">'; 
foreach ($menu as $link=>$href) 
{ 
echo "<li style='$style'><a class = 'a' href=\"$href\">", $link, '</a></li>'; 
} 
echo '</ul>'; 
} 
?>