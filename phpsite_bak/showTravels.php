<?php
session_start();
?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>�������</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
</head>

<body>
<table width="1052" border="0" align="center" bgcolor="#FFFFFF"  cellpadding="0" cellspacing="0">
 <tr >
    <td colspan=2 background="img/head.gif" width="1052" height="224" class="style3">
    <a href="logged_in.php"><b> <i> ���������<br> ��-���� </i></b></a>
    </td>
</tr>

<!--  
    <td width="938" height="348" border="0" cellpadding="0" cellspacing="0">
      <tr>-->
  <tr>
  <? include ("blocks/lefttd.php");  ?>     
  </tr> 
      <tr> 
       <td width="810" valign="top" class="style1"  background="img/kontext.jpg">

<?php
session_start();
require_once 'config.inc';
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
mysql_query("SET NAMES cp1251");
$currentDate = mktime();
mysql_query("update travel set active=1 where check_in<$currentDate") or die(mysql_error());
$sql = "select id, check_in, check_out, counter from travel where active=0";
$result = mysql_query($sql) or die(mysql_error());
while($travels = mysql_fetch_assoc($result))
{
	$checkIn = date('m.d.Y', $travels['check_in']);
	$checkOut = date('m.d.Y', $travels['check_out']);
?>
<hr/>
<table>
<tr>
<td>����� �����</td>
<td><?=$travels['id']?></td>
</tr>
<tr>
<td>���� �����</td>
<td><?=$checkIn?></td>
</tr>
<tr>
<td>���� ���������� �����</td>
<td><?=$checkOut?></td>
</tr>
<tr>
<td>ʳ������ ������ ����</td>
<td>
<?php
echo TRAVEL_COUNTER - $travels['counter'];
?>
</td>
</tr>
<tr>
<td>
<?php
echo "<a href='logged_in.php?page=1&id_travel=". $travels['id'] ."'>����������� �����</a>"
?>
</td>
</tr>
</table>
<?php
}
mysql_close();
?>
<!--<html>

<head>
  <title></title>
</head>

<body>-->

<?php



?>

<!--</body>

</html>-->

 </td>
         <td width="246" valign="top" bgcolor="#000066" background="img/right.jpg"> 
         <? include ("login.php");  ?>
         </td>
      </tr>

  <tr>
    <td height="52" colspan=2 background= "img/footer.jpg">footer</td>
  </tr>
</table>
</body>
</html>