

<?php
include_once 'config.inc';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//echo "post travel = ". $_POST['travel'];
	if($_POST['travel'] == 'выберите заезд')
		$idTravel = '';
	else
	{
		$idTravel = explode(' ', trim(strip_tags($_POST['travel'])));
	}
	$searchLogin = trim(strip_tags($_POST['searchLogin']));
	$name = trim(strip_tags($_POST['name']));
	//echo "idTravel = ". $idTravel;
	//echo "serachLogin = ". $searchLogin;
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$sql = mysql_query("select t2.name, t2.city, t2.address, t2.contact, t2.user from travel_subs as t1 join subscriber as t2 on t1.id_user=t2.id where t1.id_travel like '%$idTravel[0]%' and t2.user like '%$searchLogin%' and t2.name like '%$name%'") or die(mysql_error());
	//$sql = mysql_query("select t1.id, t1.check_in, t1.check_out, t1.counter, t2.name, t2.city, t2.address, t2.contact, t2.user from travel as t1 left join subscriber as t2 on t1.id=t2.travel_id where t1.id like '%$idTravel[0]%' and t2.user like '%$searchLogin%' and t2.name like '%$name%'") or die(mysql_error());
	//var_dump($sql);
	echo "<table>";
	while($res = mysql_fetch_assoc($sql))
	{	
?>
<tr>
<td>Номер заезда:</td>
<td><?=$_POST['travel']?></td>
</tr>
<!--<tr>
<td>Дата заезда</td>
<td>
</td>
</tr>
<tr>
<td>Дата выезда</td>
</tr>
-->
<tr>
<td>ФИО</td>
<td><?=$res['name']?></td>
</tr>
<tr>
<td>Город</td>
<td><?=$res['city']?></td>
</tr>
<tr>
<td>Адрес</td>
<td><?=$res['address']?></td>
</tr>
<tr>
<td>Контакт</td>
<td><?=$res['contact']?></td>
</tr>
<tr>
<td>Логин</td>
<td><?=$res['user']?></td>
</tr>
<?php
	}
	echo "</table>";
	mysql_close();
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
<table width="1002" border="1" align="center" bgcolor="#FFFFFF" class="main_border">
 <tr >
    <td colspan=2><img src="img/head.gif" width="1002" height="226"></td>
</tr>
<!--  <tr>
    <td width="938" height="348" border="0" cellpadding="0" cellspacing="0">
      <tr>-->
  <? include ("blocks/lefttd.php");  ?>     
  </tr> 
      <tr> 
       <td width="750" valign="top" background= "img/kontext.gif" class="style1">

<form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
<table>
<tr>
<td>Выбрать по заезду</td>
<td>
<?php
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
mysql_query("SET NAMES cp1251");
$query = mysql_query("select id, check_in, check_out from travel where active=0");
echo "<select name='travel'>";
echo "<option>выберите заезд</option>";
while($result = mysql_fetch_assoc($query))
{
	$checkIn = date('m.d.Y', $result['check_in']);
	$checkOut = date('m.d.Y', $result['check_out']);
?>
<option><?php echo $result['id'] .'  ('. $checkIn .' - '. $checkOut .')';?></option>
<?php
}
echo "</select>";
mysql_close();
?>
</td>
</tr>
<tr>
<td>Выберите по логину</td>
<td><input type="text" name="searchLogin"></td>
</tr>
<tr>
<td>Выберите по фамилии</td>
<td><input type="text" name="name"></td>
</tr>
</table>
<input type="submit" value="отправить">
</form>
<a href="logged_in.php">вернутся на главную</a>

         <td width="252" background= "img/right.gif">   
          Мы находимся по адресу  
         </td>
      </tr>
    </td>
  </tr>
  <tr>
    <td height="22" colspan=2 background= "img/footer.gif">jf;zjf;sjf;sajf</td>
  </tr>
</table>
</body>
</html>