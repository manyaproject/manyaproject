<?php
session_start();
/*if($_SERVER['REQUEST_METHOD'] == "GET")
{
	if(!isset($_GET['page']))
	{
		header("Location: login.php?&page=1");
	}
}*/
//session_start();
require_once 'config.inc';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/*if(!is_numeric($_POST['number']))
	{
		echo "Введіть число!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
		exit;
	}
	if($_SESSION['numberCopy'] != $_POST['number'])
	{
		echo "Введіть правильне число";
		exit;
	}*/
	$login = trim(strip_tags($_POST["login"]));
	$password = md5(trim(strip_tags($_POST["password"])));
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$sql = "select * from subscriber where user='$login'";
	$sqlUser = mysql_query($sql) or die(mysql_error());
    $sqlUser = mysql_fetch_assoc($sqlUser);
	if(!$sqlUser['user'])
	{
		echo "Такого користувача не існує<br/>";
		echo "<a href='register.php'>Зареєструватися</a>";
		exit;
	}
	if($sqlUser['active'] == 0)
	{
		accountDeleted();
//		echo "Ваш аккаунт видалено. Будь-ласка зверніться до адміністратора";
		exit;
	}
	if($sqlUser['password'] != $password)
	{
		echo "Пароль не вірний. Будь-ласка введіть вірний пароль!!!<br/> <a href='login.php'>���������� �� ���</a>";
		exit;
	}
	else
	{
		$_SESSION['user'] = $sqlUser['user'];
		$_SESSION['id'] = $sqlUser['id'];
		echo "sqlUser = ". $sqlUser['id'] ."<br />";
		echo "session = ". $_SESSION['id'] ."<br />";
		echo "<meta http-equiv='refresh' content='0; url=logged_in.php'>";
	}
	mysql_close();
}
?>
<html>

<head>
  <title>Вхід</title>
    <link href="css/style_form.css" type="text/css" rel="stylesheet">
  <link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
<form action="login.php" method="post">
<div class="login">
    <!--<tr>
    <td><br> <p align="left"><img  src="img/avtorizaciya.jpg"></p></td>
    </tr>
    <tr>-->
    <p>логін <br><input type="text" name="login"></p>
    
    <p>пароль<br><input type="password" name="password"></p>
   
</div>
<input type="submit" value="Вхід"/>
</form>
<p>Ви ще не зареєструвалися?<br> Натисніть, щоб <br><a href="register.php">зареєструватися</a></p>
<?php
function accountDeleted()
{
	echo "All is bad";
}
$_SESSION['numberCopy'] = $_SESSION['numberCopy1'];
//$numberCopy  = $_SESSION['numberCopy1'];
//$captcha = 0;
//for($i = 0; $i < 6; $i++)
//{
//	$captcha = $captcha + ($numberCopy % 10);
//	$numberCopy = intval($numberCopy / 10);
//}
//$_SESSION['captcha'] = $captcha;
//include_once 'paging.php';
//include_once 'chat.php';
//if($_SESSION['amountPages'] > 1)
//for($i = 1; $i <= $_SESSION['amountPages']; $i++)
//{
//	echo "<a href='login.php?page=$i'> $i </a>";
//}
?>

</body>

</html>