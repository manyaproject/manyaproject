<?php
session_start();
require_once 'config.inc';
$user = trim(strip_tags($_POST['login']));
//$user = "oleh";
if($_POST["number"] == $_SESSION["numberCopy"])
{
	$fio = trim(strip_tags($_POST["fio"]));
	$address = trim(strip_tags($_POST["address"]));
	$city = trim(strip_tags($_POST['city']));
	$contact = trim(strip_tags($_POST["contact"]));
	$specialty = $_POST['spec'];
	$institute = $_POST['inst'];
	$user = trim(strip_tags($_POST['login']));
	$password = md5(trim(strip_tags($_POST['password'])));
	$faculty = $_POST['fac'];
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$query = "select id from subscriber where user='$user'";
	$resQuery = mysql_query($query) or die(mysql_error());
	$res = mysql_fetch_assoc($resQuery);
	if(!$res)
	{
		$res['id'] = 0;
		$res["captcha"] = "";
	}
	$res["fio"] = $fio;
	$res["address"] = $address;
	$res["city"] = $city;
	$res['contact'] = $contact;
	$res["specialty"] = $specialty;
	$res["institute"] = $institute;
	$res["user"] = $user;
	$res["password"] = $password;
	$res["faculty"] = $faculty;
}
else 
{
	$res["id"] = 0;
	$res["captcha"] = "captcha";
}
echo json_encode($res);