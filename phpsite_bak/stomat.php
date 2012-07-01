<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Главная</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
</head>

<body>
<table width="1052" border="0" align="center" bgcolor="#FFFFFF"  cellpadding="0" cellspacing="0">
 <tr >
    <td colspan=2 background="img/head.gif" width="1052" height="224" class="style3">
    <a href="logged_in.php"><b> <i> запитайте<br> он-лайн </i></b></a>
    </td>
</tr>

<!--  
    <td width="938" height="348" border="0" cellpadding="0" cellspacing="0">
      <tr>-->
  <tr>
  <? include ("blocks/lefttd.php");  ?>     
  </tr> 
      <tr> 
       <td width="810" valign="top" class="style1"  background="img/kontext.jpg"><p>
       <p> Стоматологічний кабінет — проводяться обстеження, профілактика та лікування стоматологічних захворювань за допомогою сучасного устаткування, новітніх методик та матеріалів. Каріес; Пульпіти; Пертодонтит; Захворювання слизової оболонки ротової порожнини; Професійне чищення зубів
       <p align="right">  <a href="lik.php"> <font color="#330066" size="+1"> <b>Повернутися назад</b></font> </a>
</td>
         <td width="246" valign="top" bgcolor="#000066" background="img/right.jpg"> 
         <br><img  src="img/avtorizaciya.jpg">
		 <? include ("login.php");  ?>
         </td>
      </tr>

  <tr>
    <td height="52" colspan=2 background= "img/footer.jpg">footer</td>
  </tr>
</table>
</body>
</html>


