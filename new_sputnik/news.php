<?php
header("Content-Type: text/html; charset=UTF-8");
require_once 'config.inc';
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
mysql_query("SET NAMES cp1251");
require_once 'paging.php';
$newsListQuery = mysql_query("select * from news") or die(mysql_error());
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

            </div>

            <div id="kontext1" >


				 <?php
				 while($newsList = mysql_fetch_assoc($newsListQuery))
				 {
					if($chatList['deleted'] != 1) continue;
				?>
				<hr/>
				<p>Дата написання новини: <?=date('F j, Y, H:i:s', $newsList['date'])?></p>
				<?php
					if($_SESSION['user'] === "Administrator") echo "<a href='logged_in.php?&id=". $newsList['id'] ."'>удалить сообщение</a><br/>";
				?>


				<p>Сообщение: </p><bt/><p style="border: 1px solid blue; width: 250; height: 100"> <?=$newsList['title']?> </p>
				<?php
				}
				mysql_close();
				 	if($_SESSION['user'] == "Administrator"){
				?>
				<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				Введіть коротке повідомлення: <input type="text" name="title"><br/>
				Введіть повідомлення: <textarea cols="30" rows="8" name="message"></textarea><br/>
				<input type="submit" value="добавить">
				</form>
				<?php } ?>

            </div>


       </div>

       <div id="foot">
       "Санаторій-профілакторій "Супутник" © 2012&nbsp; | &nbsp;Федорова Марія
       </div>

     </div>
  	<!---->


</body>
</html>