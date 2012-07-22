<?php
$pass = md5(trim(strip_tags($_POST["password"])));
$user = trim(strip_tags($_POST["login"]));
mysql_connect("localhost", "sputnik", "sputnik") or die(mysql_error());
mysql_select_db("sputnik");
$q = "select password, user from subscriber where user='$user'";
$resQuery = mysql_query($q) or die(mysql_error());
$res = mysql_fetch_assoc($resQuery);
$res['typedPass'] = $pass;
$res['typedUser'] = $user;
echo json_encode($res);