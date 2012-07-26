<?php
session_start();
require_once 'config.inc';
//$user = trim(strip_tags($_POST['login']));
$user = "oleh";
if($_POST["number"] == $_SESSION["numberCopy"])
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$query = "select id from subscriber where user='$user'";
	$resQuery = mysql_query($query) or die(mysql_error());
	$res = mysql_fetch_assoc($resQuery);
	if(empty($res))
	{
		$res['user'] = "";
		$res["captcha"] = "";
	}
}	
else 
{
$res["captcha"] = "captcha";
}
echo json_encode($res);