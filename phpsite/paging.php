<?php
session_start();
include_once 'config.inc';
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
mysql_query("SET NAMES cp1251");
//$countRows = mysql_num_rows(mysql_query("select id from forum where deleted=0")) or die(mysql_error());
$var = mysql_query("select id from forum where deleted=0") or die(mysql_error());
$amountMessages['id'] = mysql_num_rows($var);
//$amountMessages = mysql_fetch_assoc($countRows);
//echo "emountMessages = ". $amountMessages['id'];
//$amountPosts = $amountMessages['id'];
//echo "amountPosts = ". $amountPosts ."<br />";
if($amountMessages['id'] % 20 == 0)
	$_SESSION['amountPages'] = $amountMessages['id']/20;
else
{
	$_SESSION['amountPages'] = 1 + $amountMessages['id']/20;
	$_SESSION['amountPages'] = intval($_SESSION['amountPages']);
//	echo "amountPages = ". $_SESSION['amountPages'] ."<br />";
}
if($amountMessages['id'] <= 20)
{
	$_SESSION['first'] = 0;
    $_SESSION['last'] = 20;
//	$_SESSION['last'] = $amountMessages['id'];
}
else if($_GET['page'] == 1)
{
	$_SESSION['first'] = 0;
	$_SESSION['last'] = 20;
}
else if($_GET['page'] == $_SESSION['amountPages'])
{
	if($_SESSION['first'] < ($_GET['page'] * 20 - 20))
	{
		$_SESSION['first'] = $_GET['page'] * 20 - 20;
		//$_SESSION['last'] = $amountMessages['id'] - ($_GET["page"] + 20);
	}
}
else
{
	$_SESSION['first'] = $_GET['page'] * 20 - 20;
	$_SESSION['last'] = 20;
//	echo "sessionFirst from the last else = ". $_SESSION['first'] ."<br />";
//	echo "sessionLast from the last else = ". $_SESSION['last'] ."<br />";
}
?>