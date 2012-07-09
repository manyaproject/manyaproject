<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Spuntik-головна</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/menu.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.5.min.js" type="text/javascript"> </script>
<script src="js/equalHeight.js" type="text/javascript"> </script>
</head>
<body>
	<div id="main">
       <div id="head"> 
           <p class="forum"><a href="logged_in.php"></a></p>
       </div>
           
       <div id="nov">
       <?php include "menu.php" ?>
       </div>
            
       <div id="kontext">
       		
             <div id="login">
				<p></p><?php include "login.php"; ?>
            </div>
            
            <div id="kontext1" >
		Інформація для бажаючих  <br>полікуватися в санаторій-профілакторії “Супутник” ВНТУ

<ol>
<li>Кількість місць для оздоровлення та лікування — 50 на один заїзд. Тривалість заїзду 21 календарний день. Студенти розміщуються по 2-3 в кімнатах блочного житу.</li>
<li>Студентам надаються послуги оздоровлення та лікування та 3-разове повноцінне харчування (по суботах і неділях харчуванння не надається)</li>
<li>Путівки для лікування в санаторії-профілакторії надаються студентам- членам профспілки 1 раз на протязі календарного року на підставі мединчої довідки ф№70, квитанції про оплату та особистої заяви.</li>
<li>Путівки видаються в профкомі студентів за 15 днів до початку заїзду згідно поданих документів. За один день до початку заїзду видача путівок припияняється.</li>
<li>З путівкою треба знову звернутися до лікаря оздоровпункту університету та взяти санаторно-крортну картку, і вже з путівкою та санаторно-курорною картокю оформитись у старшої медсестри в кабінеті № 214 санаторію-профілакторіюю з 13.00 до 20.00 години.</li>
</ol>

<p class="detal">  <a href="doc.php"> <<Повернутися назад</a>
 </div>
       </div>
       
       <div class="clear">
           <div id="foot">
           "Санаторій-профілакторій "Супутник" © 2012&nbsp; | &nbsp;
           </div>
       </div>
     </div>
  	<!---->

	
</body>
</html>
