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
       <td width="810" valign="top" class="style_left1"  background="img/kontext.jpg">
		<center><b>Інформація для бажаючих  <br>полікуватися в санаторій-профілакторії “Супутник” ВНТУ</b></center>
<br>
<ol>
<li>Кількість місць для оздоровлення та лікування — 50 на один заїзд. Тривалість заїзду 21 календарний день. Студенти розміщуються по 2-3 в кімнатах блочного житу.</li>
<li>Студентам надаються послуги оздоровлення та лікування та 3-разове повноцінне харчування (по суботах і неділях харчуванння не надається)</li>
<li>Путівки для лікування в санаторії-профілакторії надаються студентам- членам профспілки 1 раз на протязі календарного року на підставі мединчої довідки ф№70, квитанції про оплату та особистої заяви.</li>
<li>Путівки видаються в профкомі студентів за 15 днів до початку заїзду згідно поданих документів. За один день до початку заїзду видача путівок припияняється.</li>
<li>З путівкою треба знову звернутися до лікаря оздоровпункту університету та взяти санаторно-крортну картку, і вже з путівкою та санаторно-курорною картокю оформитись у старшої медсестри в кабінеті № 214 санаторію-профілакторіюю з 13.00 до 20.00 години.</li>
</ol>
<p class="style_left">Ми чекаємо на Вас.<br>
І де Ви ще знайдете такий спектр послуг і море задоволення, ще й майже задарма.<br>
Головний лікар санаторію-профілакторію “Супутник” ВНТУ Велика Наталія Йосипівна, роб.тел. 598-767, моб.тел. 0962115833
</p>
<p align="right">  <a href="doc.php"> <font color="#330066" size="+1"> <b>Повернутися назад</b></font> </a>
 </td>
 <td width="244" valign="top" bgcolor="#000066" background="img/right.jpg"> 
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
