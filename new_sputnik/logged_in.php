<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
if($_SERVER['REQUEST_METHOD'] == "GET")
{
	if(!isset($_GET['page']))
	{
		header("Location: logged_in.php?&page=1");
	}
}

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
if($_SESSION['user'] == '')
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");

	mysql_close();
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$message = $_POST["message"];
	$id_user = $_SESSION['id'];
	$date = mktime();
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
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Spuntik-аккаунт</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/menu.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.5.min.js" type="text/javascript"> </script>
<script src="js/equalHeight.js" type="text/javascript"> </script>
<script src="js/jseffects.js" type="text/javascript"> </script>
</head>
<body>
	<div id="main">
       <div id="head">
           <p class="forum"><a href="logged_in.php"></a></p>
       </div>

       <div id="nov">
       <?php include "menu.php"?>
       </div>

       <div id="kontext">

             <div id="login">
				<?php
				if(isset($_SESSION['user']))
					include "userMenu.php";
				else
					include "login.php";
				?>
            </div>

            <div id="kontext1" >
            <p class="warning">Увага! Лише зареєстровані користувачі можуть залишати повідомлення.</p>
<?php if(isset($_SESSION['user'])){ ?>
<p class="grafik">Ви зайшли під користувачем: <?=$_SESSION['user']?></p>
<?php
}
if($_SESSION['user'] !== 'Administrator')
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$year = mktime(0, 0, 0, 0, 0, date("Y"));
mysql_close();

}


include_once 'chat.php';
?>
<?php if(isset($_SESSION['user'])){ ?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="chatForm">
<p><b>Введіть ваш коментарій</b><br/></p>
<p class="amount_symbol" id="countSymbols"></p>
<textarea class="textarea_chat" cols="81" rows="8" name="message" onKeyUp="checkLength()" id="chatMessage"></textarea><br/>
<p style="display: none" id="chatError">Ви не написали повідомлення</p>
<input type="button" value="Додати" onClick="chatValidate()"/>
</form>
<?php
}
if($_SESSION['amountPages'] > 1)
for($i = 1; $i <= $_SESSION['amountPages']; $i++)
{
	echo "<a href='logged_in.php?page=$i'> $i </a> ";
}
?>

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