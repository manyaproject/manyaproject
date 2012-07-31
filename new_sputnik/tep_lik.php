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
       <?php include "menu.php";?>       
       </div>
            
       <div id="kontext">
       		
             <div id="login">
				<p></p><?php
				if(isset($_SESSION['user']))
					include "userMenu.php";
				else
					include "login.php";
				?>
            </div>
            
            <div id="kontext1" >
       <p>Парафіно-озекеритолікування чудово лікує захворювання бронхолегеневої системи, хребта, суглобів. </p>
       <p>Це вид лікування теплом. Як тепловий агент тут використовується оброблений озокерний-гірський віск, який складається із суміші парафіну, церезину, мінеральних солей та смол. Для лікування застосовується озокерит з якого видалено воду, луги, кислоти з температурою плавлення 52-55 С. </p>
 
      <p class="detal">  <a href="lik.php"><<Повернутися назад </a>
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
