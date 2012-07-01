<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	//$sql =
	//mysql_close();
}
?>
<html>

<head>
  <title></title>
</head>

<body>
<?php
/*mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
mysql_query("SET NAMES cp1251");*/
$chatListQuery = mysql_query("select t2.user,t2.status, t1.date, t1.message from forum as t1, subscriber as t2 where t1.id_user = t2.id") or die(mysql_error());
/*while($chatList = mysql_fetch_assoc($chatListQuery))
{
	var_dump($chatList);
}*/
while($chatList = mysql_fetch_assoc($chatListQuery))
{
?>
<hr/>
<p>Пользователь: <?=$chatList['user']?></p>
<p>Статус: <?php echo $chatList['status'] == 0 ? "Статус user": "статус administrator";?></p>
<p>Дата написания поста: <?=$chatList['date']?></p>
<p>Сообщение: </p><bt/><p style="border: 1px solid blue; width: 250; height: 100"> <?=$chatList['message']?> </p>
<?php
/*	echo "-------------------------------------------------------------------------------";
	print("user: $chatList['user'] <br/>");
	if($chatList["status"] == 0)
	{
		echo "status: user <br/>";
	}
	else
	{
		echo "status: administrator <br/>";
	}
	echo "date: $chatList['date'] <br/>";
	echo "message:<br/> $chatList['message'] <br/>";*/

}
mysql_close();
?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<b>Введите ваш комментарий</b>
<textarea cols="30" rows="8"></textarea><br/>
<input type="submit" value="добавить">
</form>

</body>

</html>