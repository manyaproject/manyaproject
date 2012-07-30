<?php
header("Content-Type: text/html; charset=UTF-8");
require_once 'config.inc';
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
mysql_query("SET NAMES cp1251");
require_once 'paging.php';
$newsListQuery = mysql_query("select id, title, date, deleted from news") or die(mysql_error());
if(isset($_GET['deleted']))
{
	$sqlQuery = "update news set deleted=1 where id=". $_GET['deleted'];
	$sqlBody = mysql_query($sqlQuery) or die(mysql_error());
	//while($news = mysql_fetch_assoc($sqlQuery))
}
if(isset($_GET['new']))
{
	$sqlQuery = "select id, body from news where id=". $_GET['new'];
	$sqlBody = mysql_query($sqlQuery) or die(mysql_error());
	//while($news = mysql_fetch_assoc($sqlQuery))
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["title"]) and isset($_POST["message"]))
{
	$title = $_POST["title"];
	$message = $_POST["message"];
	$date = mktime();
	$sql = "insert into news(title, body, date) values('$title', '$message', $date)";
	mysql_query($sql) or die(mysql_error());
	header("Location: ". $_SERVER["PHP_SELF"]);
	exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Spuntik-головна</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/menu.css" type="text/css" rel="stylesheet">

</head>
<body>
	<div id="main">
       <div id="head">
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


				<?php
				 while($newsList = mysql_fetch_assoc($newsListQuery))
				 {
					if($newsList['deleted'] == 1) continue;
				?>
				<hr/>
				<p>Дата написання новини: <?=date('F j, Y, H:i:s', $newsList['date'])?></p>
				<?php
					if($_SESSION['user'] === "Administrator") echo "<a href='news.php?&deleted=". $newsList['id'] ."'>Видалити повідомлення</a><br/>";
				if(isset($sqlQuery) and $newsList['id'] == $_GET['new'])
				{
					while($news = mysql_fetch_assoc($sqlBody))
					{
				?>
					<p>Повідомлення: </p><bt/><p style="border: 1px solid blue; width: 250; height: 100"> <a class="link" href="news.php?&title=<?=$news['id']?>">
					<?php
					$com = explode("##", $news['body']);
					$body = explode("::", $news['body']);
					for($i = 0; $i < count($body); $i++)
					{
						if($i%2 == 0)
						{
							$body[$i] = ereg_replace("##". $com[$i] ."##", " ", $body[$i]);
							echo $body[$i];
						}
						else
						{
							echo "<img src='uploads/". $body[$i] ."'/>";
							//echo $com[$i];
						}
					}
					?> </a></p>
				<?php
					}
					continue;
				}
				?>
					<p>Повідомлення: </p><bt/><p style="border: 1px solid blue; width: 250; height: 100"> <a class="link" href="news.php?&new=<?=$newsList['id']?>"><?=$newsList['title']?> </a></p>
				<?php
				}
				mysql_close();
				 	if($_SESSION['user'] == "Administrator")
					{
				?>
				<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				Введіть коротке повідомлення: <input type="text" name="title"><br/>
				Введіть повідомлення: <textarea cols="30" rows="8" name="message"></textarea><br/>
				<input type="submit" value="добавить">
				<a href="upload.php">Загрузити фотографії на сервер</a>
				<?php } ?>
				<p style="display: none" id="uploadSuccessful">Ваш файл був загружений вдало</p>
				<p style="display: none" id="uploadError">При загрузці файлу виникла помилка</p>

            </div>


       </div>

       <div id="foot">
       "Санаторій-профілакторій "Супутник" © 2012&nbsp; | &nbsp;Федорова Марія
       </div>

     </div>
  	<!---->


</body>
</html>