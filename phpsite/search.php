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

<tr >
	
  <? include ("blocks/lefttd.php");  ?>     
  </tr> 
<?php
include_once 'config.inc';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//echo "post travel = ". $_POST['travel'];
	//if($_POST['travel'] == '�������� �����')
//		$idTravel = '';
//	else
//	{
//		$idTravel = explode(' ', trim(strip_tags($_POST['travel'])));
//	}
	$searchLogin = trim(strip_tags($_POST['searchLogin']));
	$name = trim(strip_tags($_POST['name']));
	//echo "idTravel = ". $idTravel;
	//echo "serachLogin = ". $searchLogin;
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$sql = mysql_query("select name, city, address, contact, user from subscriber where user like '%$searchLogin%' and name like '%$name%'") or die(mysql_error());
	//$sql = mysql_query("select t1.id, t1.check_in, t1.check_out, t1.counter, t2.name, t2.city, t2.address, t2.contact, t2.user from travel as t1 left join subscriber as t2 on t1.id=t2.travel_id where t1.id like '%$idTravel[0]%' and t2.user like '%$searchLogin%' and t2.name like '%$name%'") or die(mysql_error());
	//var_dump($sql);
	//echo "<table>";
	while($res = mysql_fetch_assoc($sql))
	{
?>

<td  colspan="2"  background="img/1.jpg">
<p class="style_coment ">
   ���
    <?=$res['name']?>
<br>
    �����
    <?=$res['city']?>
<br>
    �����
    <?=$res['address']?>
<br>
	�������
    <?=$res['contact']?>
<br>
    �����
    <?=$res['user']?>
<hr width="70%" color="#fbe7b5"  align="left">
</td> 


<?php
	}
	//echo "</table>";
	mysql_close();
}
?>
      <tr >
     <td width="810" valign="top" class="style1"  background="img/kontext.jpg">

<form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
<p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p>
<table>

<tr>
<td>����� �� �����</td>
<td><input type="text" name="searchLogin"></td>
</tr>
<tr>
<td>����� �� ���볿</td>
<td><input type="text" name="name"></td>
</tr>
</table>
<input type="submit" value="���������">

</form>

<a href="logged_in.php">�������� �� �������</a>

         <td width="246" valign="top" bgcolor="#000066" background="img/right.jpg" rowspan="1"> 
         <br><img  src="img/avtorizaciya.jpg">
		 <? include ("login.php");  ?>
         </td>
          </tr>
<!--      </tr>
    </td>
  </tr>-->
  <tr >
<td height="52" colspan=2 background= "img/footer.jpg" class="style2" align="center">���������-������������ "�������� � 2012&nbsp; | &nbsp;�������� ����</td>
  </tr>
</table>
</body>
</html>