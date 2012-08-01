<?php
session_start();
include_once "config.inc";
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
mysql_query("SET NAMES cp1251");
require_once 'paging.php';
$chatListQuery = mysql_query("select t2.user, t2.active, t1.id, t1.date, t1.message, t1.deleted from forum as t1, subscriber as t2 where t1.id_user = t2.id and t1.deleted=0 limit ". $_SESSION['first'] .",". $_SESSION['last']) or die(mysql_error());
while($chatList = mysql_fetch_assoc($chatListQuery))
{
	if($chatList['deleted'] == 1) continue;
?>
<hr/>
<p class="grafik"> <?=$chatList['user']?>
    <?=date('F j, Y, H:i:s', $chatList['date'])?>
</p>

<bt/><p class="messenger"> <?=$chatList['message']?> </p>

<?php
if($_SESSION['user'] === "Administrator") echo "<a href='logged_in.php?&id=". $chatList['id'] ."'>Видалити повідомлення</a><br/>";
if($chatList['user'] !== 'Administrator')
if($_SESSION['user'] === "Administrator")
	{
		if($chatList['active'] == 1) echo "<a href='logged_in.php?&user=". $chatList['user'] ."_deactivate'>Деактивувати аккаунт користувача</a>";
		else echo "<a href='logged_in.php?&user=". $chatList['user'] ."_activate'>Активувати аккаунт користувача</a>";
	}

?>



<?php
}
mysql_close();
?>
<html>

<head>
<link href="css/style.css" type="text/css" rel="stylesheet">
  <title></title>
</head>

<body>
</body>

</html>