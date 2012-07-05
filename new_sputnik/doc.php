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
       <?php include "menu.php"?>
       </div>
            
       <div id="kontext">
       		
             <div id="login">
				<p></p><?php include "login.php"; ?>
            </div>
            
            <div id="kontext1" >
		<p class="style_left">Інформація для бажаючих полікуватися в санаторії-профілакторії “Супутник” ВНТУ
        <p align="right"> <a href="info.php"> <font color="#330066" size="+1"> <b>Детальніше>></b></font> </a>
        <p class="style_left">Графік заїздів
        <p align="right"> <a href="grafik.php"> <font color="#330066" size="+1"> <b>Детальніше>></b></font> </a>
<br>

<p class="style_left">Ми чекаємо на Вас.<br>
І де Ви ще знайдете такий спектр послуг і море задоволення, ще й майже задарма.<br>
Головний лікар санаторію-профілакторію “Супутник” ВНТУ Велика Наталія Йосипівна, роб.тел. 598-767, моб.тел. 0962115833
</p>
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
