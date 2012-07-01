<?php
require_once 'config.inc';
require_once 'katalog.inc.php';
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES 'utf8'");
	mysql_query("INSERT INTO institute(inst) VALUES ('". InAEKSU ."')") or die(mysql_error());

	$str = mysql_query("select * from institute");
	echo $str ."<br/>";
	$str = mysql_fetch_assoc($str);
	//echo mb_detect_encoding($str);
	$str = implode("", $str);
	echo mb_detect_encoding($str) ."<br />";
	echo $str ."<br />";
	$str = mb_convert_encoding($str, "UTF-8");
	//echo mysql_client_encoding();
	echo ($str);
	mysql_close();
?>