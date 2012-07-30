<?php
$pass = md5(trim(strip_tags($_POST["password"])));
$user = trim(strip_tags($_POST["login"]));
require_once 'config.inc';
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
$q = "select id, password, user from subscriber where user='$user'";
$resQuery = mysql_query($q) or die(mysql_error());
$res = mysql_fetch_assoc($resQuery);
$res['typedPass'] = $pass;
$res['typedUser'] = $user;
echo json_encode($res);