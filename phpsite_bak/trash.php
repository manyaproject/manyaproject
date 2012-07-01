<?php
session_start();
if($_SESSION['user'] !== "Administrator")
{
	echo "Вы не имеете доступа к этой страничке.<br/> <a href='logged_in.php'>Перейти на главную</a>";
}
require_once 'config.inc';
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
mysql_query("SET NAMES cp1251");
echo "<a href='logged_in.php'>Перейти на главную</a>";
if(isset($_GET['user']))
{
	$user = explode('_', $_GET['user']);
	if($user[1] === 'activate')
	{
		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES cp1251");
		$sql = "update subscriber set active=1 where user='". $user[0] ."'";
		mysql_query($sql) or die(mysql_error());
		mysql_close();
	}
	else
	{
		if($user[0] == "Administrator")
		{
			echo "Ви не можете видалити користувача Administrator так як це призведе до некоректної роботи системи!!!";
			return 1;
		}
		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES cp1251");
		$sql = "update subscriber set active=0 where user='". $user[0] ."'";
		mysql_query($sql) or die(mysql_error());
		mysql_close();
	}
}
$chatListQuery = mysql_query("select t2.user, t2.active, t1.id, t1.date, t1.message, t1.deleted from forum as t1, subscriber as t2 where t1.id_user = t2.id") or die(mysql_error());
if(isset($_GET['id']))
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$sql = "update forum set deleted=0 where id='". $_GET['id'] ."'";
	mysql_query($sql) or die(mysql_error());
}
while($chatList = mysql_fetch_assoc($chatListQuery))
{
	if($chatList['deleted'] == 0) continue;
?>
<hr/>
<p>Пользователь: <?=$chatList['user']?></p>
<p>Дата написания поста: <?=date('F j, Y, H:i:s', $chatList['date'])?></p>
<?php if($_SESSION['user'] === "Administrator") echo "<a href='trash.php?&id=". $chatList['id'] ."'>відновити з кошику</a><br/>";?>
<?php
//echo "id = ". $_GET['id'];
if($chatList['user'] !== 'Administrator')
if($_SESSION['user'] === "Administrator")
	{
		if($chatList['active'] == 1)echo "<a href='trash.php?&user=". $chatList['user'] ."_deactivate'>деактивувати акаунт</a>";
		else echo "Акаунт видалено <a href='trash.php?&user=". $chatList['user'] ."_activate'> активувати?</a>";
	}
?>

</form>
<p>Повідомлення: </p><bt/><p style="border: 1px solid blue; width: 240; height: 100"> <?=$chatList['message']?> </p>
<?php
}
mysql_close();
?>
<html>

<head>
  <title></title>
</head>

<body>
</body>

</html>