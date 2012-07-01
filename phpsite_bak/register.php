<?php
session_start();
require_once 'katalog.inc.php';
require_once 'config.inc';
function addGuest($fio, $city, $address, $contact,$institute , $faculty, $specialty, $user, $password)
{
    mysql_query("INSERT INTO subscriber(name, city, address, contact, active, user, password) VALUES('$fio', '$city', '$address', '$contact', 1, '$user', '$password')") or die(mysql_error());
	mysql_query("INSERT INTO faculty(fac) VALUES('$faculty')") or die(mysql_error());
	mysql_query("INSERT INTO specialty(spec) VALUES('$specialty')") or die(mysql_error());
	mysql_query("INSERT INTO institute(inst) VALUES('$institute')") or die(mysql_error());
	mysql_query("update travel set counter=counter+1 where id='$idTravel'") or die(mysql_error());
	$sql = mysql_query("select id from subscriber where user='$user'") or die(mysql_error());
	$res = mysql_fetch_assoc($sql);
	$_SESSION['id'] = $res['id'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
/*	if($_POST['travel'] == '')
	{
		echo "Неможливо зареєструватися. Не існує жодного заїзду.";
		exit;
	}*/
	if($_POST['fio'] == '' or $_POST['city'] == '' or $_POST['address'] == '' or $_POST['contact'] == '' or $_POST['login'] == '' or $_POST['password'] == '')
	{
		echo "Ви не заповнилил форму!!!";
		exit;
	}
	if(strlen($_POST['password']) < 6)
	{
		echo "Ваш пароль дуже короткий. Будь-ласка введіть як мінімум 6 знаків";
		exit;
	}
	if(!is_numeric($_POST['number']))
	{
		echo "Введіть число ЧИСЛО!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
		exit;
	}
	if($_SESSION['numberCopy'] != $_POST['number'])
	{
		echo "Введіть правильне число";
		exit;
	}
	if(md5(trim(strip_tags($_POST['password']))) != md5(trim(strip_tags($_POST['passwordCopy']))))
		{
			echo "Ви ввели не правильний пароль";
			exit;
		}
//	$travel = $_POST["travel"];
	$fio = trim(strip_tags($_POST["fio"]));
	$address = trim(strip_tags($_POST["address"]));
	$city = trim(strip_tags($_POST['city']));
	$contact = trim(strip_tags($_POST["contact"]));
	$specialty = $_POST['spec'];
	$institute = $_POST['inst'];
	$user = trim(strip_tags($_POST['login']));
	$password = md5(trim(strip_tags($_POST['password'])));
	$faculty = $_POST['fac'];
	if(mb_detect_encoding($_POST["login"]) != "ASCII" or mb_detect_encoding($_POST["password"]) != "ASCII")
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

</style>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Санаторій-профілакторій "Супутник"</title>
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
       <td td width="810" valign="top" class="style_left"  background="img/kontext.jpg">
<h1 align="center">Реєстраційна форма</h1>
<form name="registration" action="<?=$_SERVER['PHP_SELF']?>" method="post">
<table class="style_left">
<tr>
<td>ПІБ:</td> <td><input type="text" name="fio"></td>
</tr>
<tr>
<td>Ваше місто:</td> <td><input type="text" name="city"></td>
</tr>
<tr>
<td>Ваша адреса:</td> <td><input type="text" name="address"></td>
</tr>
<tr>
<td>Ваші контакти:</td> <td><input type="text" name="contact"></td>
</tr>
<tr>
<td>Ваш логін <font size="-4">(використовуйте лише<br>англійські літери та цифри)</font></td>
<td><input type="text" name="login"></td>
</tr>
<tr>
<td>Ваш пароль <font size="-4">(використовуйте лише<br>англійські літери та цифри)</font></td>
<td><input type="password" name="password"></td>
</tr>
<tr>
<td>Повторіть Ваш пароль</font></td>
<td><input type="password" name="passwordCopy"></td>
</tr>
<tr>
<td>Виберіть іинститут:</td> <td><select name="inst" size="1" class="spisok">
<option><?php echo InAEKSU; ?></option>
<option><?php echo InBTGPE; ?></option>
<option><?php echo InEEEM; ?></option>
<option><?php echo InITKI ;?></option>
<option><?php echo InMT; ?></option>
<option><?php echo InRTZP; ?></option>
<option><?php echo InFEP; ?></option>
</select></td>
</tr>
<tr>
<td>Виберіть факльтет:</td> <td><select name="fac" class="spisok">
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
</select></td>
</tr>
<tr>
<td>Виберіть спеціальність:</td> <td><select name="spec" class="spisok">
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
</select></td>
</tr>
</table>
<p class="style_left">Введіть число <font color="#FF0000">* </font>:<br>
<INPUT type='text' name='number'> <img height='50' width='100' border='0' src='image.php'><br><br>
<input type="submit" value="відправити"/></p>
</form>
<?php
//echo $_SESSION['captcha'] ."<br/>";
//echo 'numberCopy1'. $_SESSION['numberCopy1'] ."<br/>";
$_SESSION['numberCopy'] = $_SESSION['numberCopy1'];
//echo $_SESSION['numberCopy'];
//$numberCopy  = $_SESSION['numberCopy1'];
//$captcha = 0;
//for($i = 0; $i < 6; $i++)
//{
//	$captcha = $captcha + ($numberCopy % 10);
//	$numberCopy = intval($numberCopy / 10);
//}
//$_SESSION['captcha'] = $captcha;

//include_once 'showTravels.php';

?>
          <td width="247" valign="top" bgcolor="#000066" background="img/right.jpg"> 
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
</html>
