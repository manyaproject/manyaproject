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
            <p> Одним з традиційних і дуже ефективних методів фізіотерапії є електросон. Він викликається шляхом впливу на центральну нервову систему низькочастотного імпульсного струму. В результаті цього виникає ритмічне монотонне роздратування кори головного мозку, наступає гальмування, а потім і сон. Його терапевтичний ефект полягає в нормалізації функцій вегетативної нервової системи, кровотворення і артеріального тиску. Крім того, у пацієнтів поліпшується робота міокарда, знімається емоційне збудження, стимулюються обмінні процеси. Електросон надає аналгезуючий, вегетостабілізуючий та седативний ефект. Апарат “Електросон” застосовується для лікування психоневрологічних захворювань, гіпертонії, ішемічної хвороби серця, вегето-судинної дистонії, при порушеннях сну, після черепномозкових травм.. Вона дуже корисна для людей, які відновлюють здоров'я після інфаркту міокарда і складних операцій. </p>
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

