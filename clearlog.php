 /**  
 * @name {String} name ОЧИСТКА ТАБЛИЦЫ
 * @author {String} author Ощепков Кирилл
<?php 
    include "BaseVar.php";
		
	$zap = "truncate table log";
	$bd->query($zap);	
?>