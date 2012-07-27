<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Spuntik-головна</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/menu.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.5.min.js" type="text/javascript"> </script>
<script src="js/equalHeight.js" type="text/javascript"> </script>
</head>
<body>
	<div id="main">
       <div id="head">
           <p class="forum"><a href="logged_in.php"></a></p>
       </div>

       <div id="nov">
       <?php include "menu.php";?>
       </div>

       <div id="kontext">

             <div id="login">
				<p></p><?php 
				if(isset($_SESSION['user']))
					include "userMenu.php"; 
				else
					include "login.php";
				?>
            </div>

            <div id="kontext1" >
<?php
if($_SESSION['user'] !== "Administrator")
{
	echo "Ви не маєте доступу до даної сторінки.<br/> <a href='logged_in.php'>Перейти на головну</a>";
}
require_once 'config.inc';
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
mysql_query("SET NAMES cp1251");
echo "<a href='logged_in.php'>Перейти на головну</a>";
if(isset($_GET['new']))
{
	$sqlNewRestore = "update news set deleted=0 where id=". $_GET['new'];
	mysql_query($sqlNewRestore) or die(mysql_query());
}
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
			echo "Ви не можете видалити користувача адміністратор так як це призведе до неправильної роботи системи!!!";
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
<p>Користувач: <?=$chatList['user']?></p>
<p>Дата написання повідомлення: <?=date('F j, Y, H:i:s', $chatList['date'])?></p>
<?php if($_SESSION['user'] === "Administrator") echo "<a href='trash.php?&id=". $chatList['id'] ."'>Відновити повідомлення</a><br/>";?>
<?php
//echo "id = ". $_GET['id'];
if($chatList['user'] !== 'Administrator')
if($_SESSION['user'] === "Administrator")
	{
		if($chatList['active'] == 1)echo "<a href='trash.php?&user=". $chatList['user'] ."_deactivate'>Деактивувати користувача</a>";
		else echo "<a href='trash.php?&user=". $chatList['user'] ."_activate'>Активувати користувача</a>";
	}
?>

</form>
<p>Повідомлення: </p><bt/><p style="border: 1px solid blue; width: 240; height: 100"> <?=$chatList['message']?> </p>
<?php
}
$sqlNews = "select id, title from news where deleted=1";
$sqlTrashedNews = mysql_query($sqlNews) or die(mysql_error());
mysql_close();
while($trashedNews = mysql_fetch_assoc($sqlTrashedNews))
{
?>
<br/><a href="trash.php?&new=<?=$trashedNews['id']?>"><?=$trashedNews['title']?></a>

<?php
}
?>
                <p>
            </div>
       </div>

       <div class="clear">
           <div id="foot">
           "Санаторій-профілакторій "Супутник" © 2012&nbsp; | &nbsp;
           </div>
       </div>
     </div>
  	<!---->


</body>
</html>