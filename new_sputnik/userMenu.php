<?php
session_start();
if(isset($_SESSION['user']))
{
	echo "<a href='exit.php'>Вихід</a>";
}
if($_SESSION['user'] === "Administrator")
	{
		echo "<br /><a href='search.php'>Пошук</a>";
		echo "<br /><a href='addTravel.php'>Додати заїзд</a><br/>";
		echo "<a href='news.php'>Додати новину<a/><br/>";
		echo "Показати<a href='trash.php'>Кошик</a> <br/>";
	}
?>