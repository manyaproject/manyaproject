<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "post")
{
	$user = $_SESSION["user"];
	$pass = md5(trim(strip_tags($_POST['newPass'])));
	echo $_SESSION["user"];
	$newPass = md5(trim(strip_tags($_POST['newPassRepeat'])));
	if($pass !== $newPass)
	{
		echo "Ви ввели не правильний пароль!!!";
	}
	require_once 'config.inc';
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	mysql_query("update subscriber set password=$pass where user='$user'") or die(mysql_error());
	mysql_close();
}
?>
<html>
<head>
<?php
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
<script src="js/jquery-1.5.min.js" type="text/javascript"> </script>
<script src="js/jquery.form.js" type="text/javascript"> </script>
<script src="js/jseffects.js" type="text/javascript"> </script>
</head>
<body>
<form action="<?=$_SERVER['PHP_SELF']?>" id="changePass" method="post">
Введіть новий пароль<input type="text" id="newPass" name="newPass"/>
<p style="display:none" id="wrongPass">Ви ввели не правильний пароль. Пароль повинен містити лише латинські букви та цифри та знак:"_"</p>
Повторіть новий пароль <input type="text" id="newPassRepeat" name="newPassRepeat"/>
<p style="display:none" id="changePassError">Ви ввели не правильний пароль. Будь ласка спробуйте ще раз</p>
<input type="button" value="Змінити" onclick="checkPass()">
</form>
</body>
</html>