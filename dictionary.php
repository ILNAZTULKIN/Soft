/**
 *
 * @name {String} name Проверка полей при регистрации

 * @author {String} author Ощепков Кирилл
 *
 */
 
<?php

		//function strip_data($text) // фильтрация строки 
		//{
		//$quotes = array ("\x27", "\x22", "\x60", "\t", "\n", "\r", "*", "%", "<", ">", "?", "!" );
		//$goodquotes = array ("+", "#", " " );
		//$repquotes = array ("\+", "\#" );
		//$text = trim( strip_tags( $text ) );
		//$text = str_replace( $quotes, '', $text );
		//$text = str_replace( $goodquotes, $repquotes, $text );

		//return $text;
		//}


		// фильтрация строки заменина с function strip_data($text) на filter_var()
		// -----------------------------------Обработчик формы регитсрации-----------------------------

		function registr(array $records)
		{		
			if(trim ($_POST['sugar'])=='')
			{
				throw new Exception('Введите логин!');
			}
			if(filter_var($_POST['sugar'],FILTER_SANITIZE_URL,FILTER_SANITIZE_FULL_SPECIAL_CHARS)!=$_POST['sugar'])
			{
				throw new Exception('В логине присутствуют недопустимые символы: "*", "%", "<", ">", "?", "!", "+", "#"');
			}
			if($records)
			{
				throw new Exception('Пользователь с таким логином уже cуществует');
			}
			
			if($_POST['cheese']=='') 
			{
				throw new Exception('Введите пароль!');
			}
			if(filter_var($_POST['cheese'],FILTER_SANITIZE_URL,FILTER_SANITIZE_FULL_SPECIAL_CHARS)!=$_POST['cheese'])
			{
				throw new Exception('В пароле присутствуют недопустимые символы: "*", "%", "<", ">", "?", "!", "+", "#"');
			}
			if($_POST['tomato']=='') 
			{
				throw new Exception('Введите поворный пароль!');
			}
			if($_POST['tomato'] != $_POST['cheese'])
			{
				throw new Exception('Повторный пароль введен не верно');
			}	
			
			return true;
		}
		
		//<!------------------------------ Обработчик формы авторизации и запуск сессии по аккаунтом -------------------------->
		function avtoris(array $pass)
		{		
			if(trim ($_POST['sugar'])=='')
			{
				throw new Exception('Введите логин!');
			}
			if($_POST['cheese']=='') 
			{
				throw new Exception('Введите пароль!');
			}
			if(!$pass)
			{
				throw new Exception('Проверьте написание пароля и логина');
			}
			foreach($pass as $i => $items)
				foreach($items as $a)
					$ches=$a;
			if(!password_verify($_POST['cheese'],$ches))// сравнение введенного пароля с существующим
			{
				throw new Exception('Проверьте написание пароля и логина');
			}		
			return true;
		}
		
		
		
		
		
?>