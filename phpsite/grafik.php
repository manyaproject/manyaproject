<?php
session_start();
include_once 'config.inc';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
       <td width="810" valign="top" class="style1"  background="img/kontext.jpg">������_�����</p> 
       
        <?php
		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES cp1251");
		$sql = mysql_query("select * from travel") or die(mysql_error());
		while($travels = mysql_fetch_assoc($sql))
		{
		?>
		<p> 
		<?php 
		echo '����� �����: '.$travels['id'] ."<br/>";
		echo " ". date('m.d.Y', $travels['check_in']);
		echo " - ". date('m.d.Y', $travels['check_out']);?></p>
		<?php
		}
		?>

       
       <p align="right">  <a href="doc.php"> <font color="#330066" size="+1"> <b>����������� �����</b></font> </a>
       </td>
         <td width="246" valign="top" bgcolor="#000066" background="img/right.jpg"> 
         <br><img  src="img/avtorizaciya.jpg">
		 <? include ("login.php");  ?>
         </td>
      </tr>

  <tr>
    <td height="52" colspan=2 background= "img/footer.jpg" class="style2" align="center">���������-������������ "�������� � 2012&nbsp; | &nbsp;�������� ����</td>
  </tr>
</table>
</body>
</html>
