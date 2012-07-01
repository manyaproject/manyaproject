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
       <td width="810" valign="top" class="style1"  background="img/kontext.jpg">графік заїздів на 2012 рік:</p>
       1. 16.01 - 13.02<br>
       2. 16.02 - 16.03<br> 
       3. 21.03 - 19.04<br>
       4. 24.04 - 25.05<br>
       5. 04.09 - 02.10<br>
       6. 03.10 - 31.10<br>
       7. 01.11 - 29.11<br>
       8. 30.11 - 28.12<br>
       <p align="right">  <a href="doc.php"> <font color="#330066" size="+1"> <b>Повернутися назад</b></font> </a>
       </td>
         <td width="244" valign="top" bgcolor="#000066" background="img/right.jpg"> 
         <br><img  src="img/avtorizaciya.jpg">
		 <? include ("login.php");  ?>
         </td>
      </tr>

  <tr>
    <td height="52" colspan=2 background= "img/footer.jpg" class="style2" align="center">“Санаторій-профілакторій "Супутник” © 2012&nbsp; | &nbsp;Федорова Марія</td>
  </tr>
</table>
</body>
</html>
