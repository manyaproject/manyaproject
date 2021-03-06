<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
require_once 'katalog.inc.php';
require_once 'config.inc';
function addGuest($fio, $city, $address, $contact,$institute , $faculty, $specialty, $user, $password)
{
    mysql_query("INSERT INTO subscriber(name, city, address, contact, active, user, password) VALUES('$fio', '$city', '$address', '$contact', 1, '$user', '$password')") or die(mysql_error());
	mysql_query("INSERT INTO faculty(fac) VALUES('$faculty')") or die(mysql_error());
	mysql_query("INSERT INTO specialty(spec) VALUES('$specialty')") or die(mysql_error());
	mysql_query("INSERT INTO institute(inst) VALUES('$institute')") or die(mysql_error());
	//mysql_query("update travel set counter=counter+1 where id='$idTravel'") or die(mysql_error());
	$sql = mysql_query("select id from subscriber where user='$user'") or die(mysql_error());
	$res = mysql_fetch_assoc($sql);
	$_SESSION['id'] = $res['id'];
}
if(isset($_GET["user"]))
{
/*	if($_POST['travel'] == '')
	{
		echo "Неможливо зареєструватися. Не існує жодного заїзду.";
		exit;
	}*/
	if($_GET['fio'] == '' or $_GET['city'] == '' or $_GET['address'] == '' or $_GET['contact'] == '' or $_GET['user'] == '' or $_GET['password'] == '')
	{
		echo "Ви не заповнилил форму!!!";
		exit;
	}
	if(strlen($_GET['password']) < 6)
	{
		echo "Ваш пароль дуже короткий. Будь-ласка введіть як мінімум 6 знаків";
		exit;
	}
	$fio = trim(strip_tags($_GET["fio"]));
	$address = trim(strip_tags($_GET["address"]));
	$city = trim(strip_tags($_GET['city']));
	$contact = trim(strip_tags($_GET["contact"]));
	$specialty = $_GET['specialty'];
	$institute = $_GET['institute'];
	$user = trim(strip_tags($_GET['user']));
	$password = trim(strip_tags($_GET['password']));
	$faculty = $_GET['faculty'];
	if(mb_detect_encoding($_GET["user"]) != "ASCII" or mb_detect_encoding($_GET["password"]) != "ASCII")
		echo "Використовуйте лише англійські букви та цифри в полях вводу логіна та пороля";
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES cp1251");
	$checkUsers = mysql_query("select user from subscriber") or die(mysql_error());
	while($check = mysql_fetch_array($checkUsers))
	{
		if($user == $check['user'])
		{
			echo "Такий логін вже використовується у системі. Будь-ласка <a href='register.php'>спробуйте ще раз.</a>";
			exit;
		}
	}
//	$travel = explode('  ', $travel);
	addGuest($fio, $city, $address, $contact, $institute , $faculty, $specialty, $user, $password);

	$_SESSION['user'] = $user;

	mysql_close();
	header("Location: logged_in.php");
	exit;
}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Spuntik-реєстрація</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/menu.css" type="text/css" rel="stylesheet">
<link href="css/style_form.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.5.min.js" type="text/javascript"> </script>
<script src="js/jquery.form.js" type="text/javascript"> </script>
<script src="js/jseffects.js" type="text/javascript"> </script>
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
            <?php 
				if(isset($_SESSION['user']))
					include "userMenu.php"; 
				else
					include "login.php";
				?>
            </div>

            <div id="kontext1" >
               <h1 align="center">Реєстраційна форма</h1>
               <form name="registration" action="ajaxRegister.php" method="post" id="registerForm">
                                        
                    <img class="img_l" src="images/boy_l.png">
                    <div id="kontext1_left">
                        <fieldset>
                        <legend> Персональна інформація </legend>
                        <p class="question"><label>Прізвище, ім'я, по-батькові: <input class="input" type="text" name="fio"> </label></p>
                        <p class="question"><label>Ваше місто:<input class="input" type="text" name="city"></label></p>
                        <p class="question"><label>Ваша адреса:<input class="input" type="text" name="address"></label></p>
                        <p class="question"><label>Ваші контакти:<input class="input" type="text" name="contact"></label></p>
                        <p class="warning" style="display: none" id="emptyFields">Ви не заповнили всі поля</p>
                        </fieldset>
                    </div>
                    	
                 		<img class="img_r" src="images/boy_r.png">
					<div id="kontext1_right">
                        <fieldset>
                        <legend> Логін-деталі </legend>
                        <p class="question"><label>Ваш логін <font size="-4">(використовуйте лише<br>англійські літери та цифри)</font>
                        <input class="input" type="text" name="login" id="loginReg"></label></p>
                        <p class="warning" style="display: none" id="userExists">Такий логін вже використовується у системі. Будь-ласка спробуйте ще раз. </p>
                        <p class="warning" style="display: none" id="wrongUser">Ви ввели не правильний логін користувача</p>
                        <p class="question"><label>Ваш пароль <font size="-4">(використовуйте лише<br>англійські літери та цифри).</font>
                        <input class="input" type="password" name="password" id="password"></label></p>
                        <p class="question"><label>Повторіть Ваш пароль</font>
                        <input class="input" type="password" name="passwordCopy" id="passwordCopy"></label></p>
                        <p class="warning" id="passwordError" style="display: none">Ви ввели не правильний пароль</p>
                        <!--<p class="warning" id="shotPassword" style="display: none">пароль короткий</p>-->
                        </fieldset>
                     </div>

                     
                        <fieldset class="kontext1_center">
                        <legend> Навчання </legend>
                        <p class="question"><label for="institut">Виберіть іинститут:</label>
                        <br><select name="inst" size="1" id="institut" class="spisok">
                        <option><?php echo InAEKSU; ?></option>
                        <option><?php echo InBTGPE; ?></option>
                        <option><?php echo InEEEM; ?></option>
                        <option><?php echo InITKI ;?></option>
                        <option><?php echo InMT; ?></option>
                        <option><?php echo InRTZP; ?></option>
                        <option><?php echo InFEP; ?></option>
                        </select></p>
                        <p></p>
                        <p class="question"><label for="fac">Виберіть факльтет:</label>
                        <br><select name="fac" id="fac" class="spisok">
                        <option><?php echo FAKSU; ?></option>
                        <option><?php echo FFELT; ?></option>
                        <option><?php echo FTEGP; ?></option>
                        <option><?php echo FBBM; ?></option>
                        <option><?php echo FEEE; ?></option>
                        <option><?php echo FEMEEM; ?></option>
                        <option><?php echo FKSS; ?></option>
                        <option><?php echo FKI; ?></option>
                        <option><?php echo FTAKM; ?></option>
                        <option><?php echo FARV; ?></option>
                        <option><?php echo FFZEM; ?></option>
                        <option><?php echo FIPSM; ?></option>
                        <option><?php echo FMBEP; ?></option>
                        <option><?php echo FRTTK; ?></option>
                        </select></p>
                        <p></p>
                        <p class="question"><label for="spec">Виберіть спеціальність:</label>
                        <br><select name="spec" id="spec" class="spisok">
                        <option><?php echo FAKSU_MIT; ?></option>
                        <option><?php echo FAKSU_CI; ?></option>
                        <option><?php echo FFELT_EP; ?></option>
                        <option><?php echo FFELT_MP; ?></option>
                        <option><?php echo FFELT_LOT; ?></option>
                        <option><?php echo FTEGP_MEN; ?></option>
                        <option><?php echo FTEGP_STR; ?></option>
                        <option><?php echo FBBM_STR; ?></option>
                        <option><?php echo FBBM_T; ?></option>
                        <option><?php echo FEEE_EE; ?></option>
                        <option><?php echo FEEE_E; ?></option>
                        <option><?php echo FEMEEM_ESE; ?></option>
                        <option><?php echo FEMEEM_ESAE; ?></option>
                        <option><?php echo FEMEEM_EM; ?></option>
                        <option><?php echo FKSS_KI; ?></option>
                        <option><?php echo FKSS_UIB; ?></option>
                        <option><?php echo FKSS_BIKSS; ?></option>
                        <option><?php echo FKI_PI; ?></option>
                        <option><?php echo FKI_KN; ?></option>
                        <option><?php echo FTAKM_IM; ?></option>
                        <option><?php echo FARV_S; ?></option>
                        <option><?php echo FARV_AT; ?></option>
                        <option><?php echo FIPSM_M; ?></option>
                        <option><?php echo FFZEM_M; ?></option>
                        <option><?php echo FMBEP_R; ?></option>
                        <option><?php echo FRTTK_R; ?></option>
                        <option><?php echo FRTTK_T; ?></option>
                        </select></p>
                        </fieldset>
                    

                        <img class="img_captcha" src='image.php'>
                        <p class="question"><label>Введіть число <font color="#FF0000">* </font>:
                        
                        <p> <input class="input" type='text' name='number'> </label></p><br><br>
                        <p class="warning" style="display: none"> <!--id="captcha"--> Ви ввели не правильне число</p>
                        <input class="img_botton"  type="image" src="images/Button.png" name="imageButton"></p>
                        </form>
                        <?php
                        $_SESSION['numberCopy'] = $_SESSION['numberCopy1'];
                        
                        ?>
            </div>


       </div>

       <div id="foot">
       "Санаторій-профілакторій "Супутник" © 2012&nbsp; | &nbsp;
       </div>

     </div>
  	<!---->


</body>
</html>