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
<!--<link href="css/user_menu.css" type="text/css" rel="stylesheet">-->
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
                <p>Ви хотіли б відпочити на  престижному курорті, смачно поїсти, поніжитися в морських хвилях, та розім'яти  втомлені м'язи? Для цього не потрібно їхати за кордон та витрачати великі  гроші. Ваш найкращий курорт поруч – це <b><i>санаторій-профілакторій «Супутник» ВНТУ</i></b>,  що розташований в третьому гуртожитку, вул. В. Інтернаціоналістів 11/102.<br></p>
             <p> Санаторій-профілакторій  нараховує 50 койко-місць та на протязі 30 років гостинно відчиняє двері в світ  природних методів профілактики та лікування.<br></p>
             <p> Великий наш земляк М.І.  Пирогов зазначив: «Майбутнє належить медицині профілактичній.». Сьогодні це  крилате висловлювання втілене в роботі санаторію-профілакторію «Супутник», де  на Вас чекають професійні фахівці та сучасні методи оздоровлення.<br></p>
             <p> У здравниці є їдальня,  фізіотерапевтичне та бальнеологічне відділення, кабінети масажу, лікувальної  фізкультури та стоматологічний кабінет.<br></p>
             <p> Найважливіша запорука міцного  здоров'я – регулярне та збалансоване харчування. Триразове харчування, до  складу якого щодня входить натуральне м'ясо, риба, птиця, молочні вироби, свіжі  овочі та фрукти, смачні запіканки та тістечка, надасть Вам сил та наснаги.<br></p>
            </p> <p>І після всього почутого Ви ще  думаєте? Сумніви геть! Час оформляти путівку в санаторій-профілакторій. Покваптесь,  а то можете не встигнути. Тим більше, що така можливість у Вас всього одна на  календарний рік.</p></p>
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