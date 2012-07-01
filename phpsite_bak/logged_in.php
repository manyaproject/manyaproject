<?php
//error_reporting(E_ALL);
if($_SERVER['REQUEST_METHOD'] == "GET")
{
	if(!isset($_GET['page']))
	{
		header("Location: logged_in.php?&page=1");
	}
}
session_start();
include 'config.inc';
if(isset($_GET['id_travel']))
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	mysql_query("insert into travel_subs(id_travel, id_user) values('". $_GET['id_travel'] ."', '". $_SESSION['id'] ."')") or die(mysql_error());
	mysql_close();
	header("Location: logged_in.php?&page=1");
}
if(isset($_GET['del_travel']))
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	mysql_query("delete from travel_subs where id_travel=". $_GET['del_travel']) or die(mysql_error());
	mysql_close();
	header("Location: logged_in.php?&page=1");
}
/*if($_SESSION['user'] == '')
{
	echo "Вы не имеете доступа к этой странице. Пожалуйста, зарегистрируйтесь или зайдите в свой аккаунт!!!<br/> <a href='login.php'>зайти в свой аккаунт</a>";
	exit;
}
*/if($_SERVER["REQUEST_METHOD"] == "POST")
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
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$sql = "update forum set deleted=1 where id='". $_GET['id'] ."'";
	mysql_query($sql) or die(mysql_error());
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
			echo "Ви не можете видалити користувача Administrator так як це може призвести до неправильної роботи системи!!!";
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
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Главная</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
</head>

<body>
<table width="1052" border="0" align="center" bgcolor="#FFFFFF"  cellpadding="0" cellspacing="0">
 <tr >
    <td colspan=2 background="img/head.gif" width="1052" height="224" class="style3">
    <a href="logged_in.php"><b> <i> запитайте<br> он-лайн </i></b></a>
    </td>
</tr>

<!--  
    <td width="938" height="348" border="0" cellpadding="0" cellspacing="0">
      <tr>-->
  <tr>
  <? include ("blocks/lefttd.php");  ?>     
  </tr> 
      <tr> 
       <td width="810" valign="top" class="style_coment"  background="img/kontext.jpg">
<?php
if(isset($_SESSION['user'])) echo "<p>Ви зайшли під користувачем: ". $_SESSION['user'] ."</p>";
?>
<?php
if($_SESSION['user'] === "Administrator")
	{
		echo "<br /><a href='search.php'>Пошук</a>";
		echo "<br /><a href='addTravel.php'>Додати заїзд</a><br/>";
		echo "Показати <a href='trash.php'>кошик</a> <br/>";
	}




if(isset($_SESSION['user']) and $_SESSION['user'] !== 'Administrator')
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$year = mktime(0, 0, 0, 0, 0, date("Y"));
//	echo "year = ". $year ."<br/>";
//	echo $_SESSION['id'];
	$sqlUsersTravel = mysql_query("select t1.id_travel, t2.check_in, t2.check_out from travel_subs as t1 join travel as t2 on t1.id_travel=t2.id where t1.id_user=". $_SESSION['id'] ." and t2.check_in>$year") or die(mysql_error());
//	var_dump($sqlUsersTravel);
	
	$check = 0;
	while($usersTravel = mysql_fetch_assoc($sqlUsersTravel))
	{
	    //echo "id_travel=". $usersTravel['id_travel'];
		if(isset($usersTravel['id_travel']))
		{
			$check = 1;
			date('F j, Y, H:i:s', $chatList['date']);
			echo "У вас заброньоване місце у заїзді №". $usersTravel['id_travel'] ."<br/> заїзд розпочинається ". date('F j, Y', $usersTravel['check_in']) ." та завершується ". date('F j, Y', $usersTravel['check_out']);
			echo "<br /><a href=logged_in.php?page=1&del_travel=". $usersTravel['id_travel'] .">Видалити себе з даного заїзду</a><br />";
		}
		//else echo "<br/><a href='showTravels.php'>Посмотреть доступные заезды</a><br />";
	}
	if($check == 0)
		echo "<br/><a href='showTravels.php'>Продивитись доступні заїзди</a><br />";
mysql_close();

}

if(isset($_SESSION['user'])) echo "<a href='exit.php'>вийти</a>";
include_once 'chat.php';





/*	if(isset($_SESSION['user']))
	{*/
?>
<p class="style_left1">
Залишати коментарій може лише зареєстрований користувач
<form action="logged_in.php" method="post">
<b>Введіть ваш коментарій</b><br/>
<textarea cols="30" rows="8" name="message"></textarea><br/>
<input type="submit" value="Додати"></p>
</form>
<?php
/*}*/
if($_SESSION['amountPages'] > 1)
for($i = 1; $i <= $_SESSION['amountPages']; $i++)
{
	echo "<a href='logged_in.php?page=$i'> $i </a> ";
}
?>
</td>
         <td width="247" background="img/right.jpg" class="style2" valign="top" bgcolor="#000066" >  
		 <br><img  src="img/avtorizaciya.jpg">
          <? include("login.php"); 
		 
/*		  if(!isset($_SESSION['user'])) include ("login.php");  
		  else
		  {
		  	//Маня, солнішко, зайчик, сюда надо записать как ті меня любишь, но віводить єту інфу не обязательно на обозрение, о я им потом ногу сломаю))))
			echo "Наша адреса: ";
		  }*/
		  ?>  

         </td>
      </tr>

  <tr>
    <td height="52" colspan=2 background= "img/footer.jpg">footer</td>
  </tr>
</table>
</body>
</html>
