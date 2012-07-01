<?php
//error_reporting(E_ALL);
session_start();
if($_SERVER['REQUEST_METHOD'] == "GET")
{
	if(!isset($_GET['page']))
	{
		header("Location: logged_in.php?&page=1");
	}
}

include 'config.inc';
if(isset($_GET['id_travel']))
{	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	mysql_query("insert into travel_subs(id_travel, id_user) values('". $_GET['id_travel'] ."', '". $_SESSION['id'] ."')") or die(mysql_error());
	mysql_close();
	header("Location: logged_in.php?&page=1");}
if(isset($_GET['del_travel']))
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	mysql_query("delete from travel_subs where id_travel=". $_GET['del_travel']) or die(mysql_error());
	mysql_close();
	header("Location: logged_in.php?&page=1");
}
if($_SESSION['user'] == '')
{	echo "Вы не имеете доступа к этой странице. Пожалуйста, зарегистрируйтесь или зайдите в свой аккаунт!!!<br/> <a href='login.php'>зайти в свой аккаунт</a>";
	exit;}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$message = $_POST["message"];
	//echo "session id = ". $_SESSION['id'] ."<br />";
	$id_user = $_SESSION['id'];
	$date = mktime();
	//echo "message = ". $message;
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	mysql_query("insert into forum(message, date, id_user) values('$message', '$date', '$id_user')") or die(mysql_error());
	unset($message, $id_user, $date);
	mysql_close();
	header("Location: logged_in.php?&page=". $_SESSION['amountPages']);
	exit;
}
if(isset($_GET['id']))
{	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$sql = "update forum set deleted=1 where id='". $_GET['id'] ."'";
	mysql_query($sql) or die(mysql_error());}
if(isset($_GET['user']))
{
	$user = explode('_', $_GET['user']);
	if($user[1] === 'activate')
	{		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES cp1251");
		$sql = "update subscriber set active=1 where user='". $user[0] ."'";
		mysql_query($sql) or die(mysql_error());
		mysql_close();	}
	else
	{
		if($user[0] == "Administrator")
		{			echo "Вы не можете удалить пользователя Administrator так как это может привести к некорректной работе системы!!!";
			return 1;		}
		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES cp1251");
		$sql = "update subscriber set active=0 where user='". $user[0] ."'";
		mysql_query($sql) or die(mysql_error());
		mysql_close();
	}
}
?>
<html>

<head>
  <title></title>
</head>

<body>
<p>Вы зашли под пользователём <?=$_SESSION['user']?></p>
<?php
if($_SESSION['user'] !== 'Administrator')
{	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$year = mktime(0, 0, 0, 0, 0, date("Y"));
//	echo "year = ". $year ."<br/>";
	$sqlUsersTravel = mysql_query("select t1.id_travel, t2.check_in, t2.check_out from travel_subs as t1 join travel as t2 on t1.id_travel=t2.id where t1.id_user=". $_SESSION['id'] ." and t2.check_in>'$year'") or die(mysql_error());
//	var_dump($sqlUsersTravel);
	$check = 0;
	while($usersTravel = mysql_fetch_assoc($sqlUsersTravel))
	{
	    //echo "id_travel=". $usersTravel['id_travel'];		if(isset($usersTravel['id_travel']))
		{
			$check = 1;
			date('F j, Y, H:i:s', $chatList['date']);
			echo "У Вас есть забронированное место заезде №". $usersTravel['id_travel'] ."<br/> заезд начинается ". date('F j, Y', $usersTravel['check_in']) ." и заканчивается ". date('F j, Y', $usersTravel['check_out']);
			echo "<br /><a href=logged_in.php?page=1&del_travel=". $usersTravel['id_travel'] .">Убрать себя из этого заезда</a><br />";
		}
		//else echo "<br/><a href='showTravels.php'>Посмотреть доступные заезды</a><br />";	}
	if($check == 0)
		echo "<br/><a href='showTravels.php'>Посмотреть доступные заезды</a><br />";
mysql_close();

}

echo "<a href='exit.php'>выйти</a>";
include_once 'chat.php';
if($_SESSION['user'] === "Administrator")
	{
		echo "<br /><a href='search.php'>Поиск</a>";
		echo "<br /><a href='addTravel.php'>Добавить заезд</a><br/>";
		echo "<a href='news.php'>Добавить новость<a/><br/>";
		echo "Показать <a href='trash.php'>корзину</a> <br/>";
	}
?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<b>Введите ваш комментарий</b><br/>
<textarea cols="30" rows="8" name="message"></textarea><br/>
<input type="submit" value="добавить">
</form>
<?php
if($_SESSION['amountPages'] > 1)
for($i = 1; $i <= $_SESSION['amountPages']; $i++)
{
	echo "<a href='logged_in.php?page=$i'> $i </a> ";
}
?>

</body>

</html>