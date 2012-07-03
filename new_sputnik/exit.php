<?php
	session_start();
	if(empty($_SESSION['user']))
	{
	//если не существует сессии с логином и паролем, значит на    этот файл попал невошедший пользователь. ≈му тут не место. ¬ыдаем сообщение    об ошибке, останавливаем скрипт
	exit ("ƒоступ на эту    страницу разрешен только зарегистрированным пользовател€м. ≈сли вы    зарегистрированы, то войдите на сайт под своим логином и паролем<br><a    href='logged_in.php'>√лавна€    страница</a>");
	}
	unset($_SESSION['user']);
	unset($_SESSION['id']);//    уничтожаем переменные в сесси€х
	unset($_SESSION['first']);
	unset($_SESSION['last']);
	unset($_SESSION['amountPages']);
	exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
	// отправл€ем пользовател€ на главную страницу.
?>