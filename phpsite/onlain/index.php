<?php
require_once 'katalog.inc.php';
require_once 'config.inc';
function addGuest($fio, $city, $address, $contact,$institute , $faculty, $specialty, $checkIn, $checkOut)
{	mysql_query("INSERT INTO subscriber(name, city, address, contact, check_in, check_out) VALUES('$fio', '$city', '$address', '$contact', '$checkIn', '$checkOut')") or die(mysql_error());
	mysql_query("INSERT INTO ");
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{    $checkInDay = $_POST['checkInDay'];
	$checkInMonth = $_POST['checkInMonth'];
	$checkInYear = $_POST['checkInYear'];
	$checkOutDay = $_POST['checkOutDay'];
	$checkOutMonth = $_POST['checkOutMonth'];
	$checkOutYear = $_POST['checkOutYear'];
	$fio = trim(strip_tags($_POST["fio"]));
	$address = trim(strip_tags($_POST["address"]));
	$city = trim(strip_tags($_POST['city']));
	$contact = trim(strip_tags($_POST["contact"]));
	$specialty = $_POST['spec'];
	$institute = $_POST['inst'];
	$faculty = $_POST['fac'];
	if(!checkdate($checkInMonth, $checkInDay, $checkInYear) or !checkdate($checkOutMonth, $checkOutDay, $checkOutYear))
	{
		echo "Вы ввели не правильную дату";
	}
	else
	{
		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db(DB_NAME);
		$checkIn = mktime(0, 0, 0, $checkInMonth, $checkInDay, $checkInYear);
		$checkOut = mktime(0, 0, 0, $checkOutMonth, $checkOutDay, $checkOutYear);
		addGuest($fio, $city, $address, $contact, $institute , $faculty, $specialty, $checkIn, $checkOut);
		mysql_close();
		header("Location: ". $_SERVER['PHP_SELF']);
		exit;
	}}
?>
<html>
<head>
<title>Регистрация</title>
</head>
<head>
<title>Регистрация</title>
</head>
<body>
<h1>Регистрационная форма</h1>
<form name="registration" action="<?=$_SERVER['PHP_SELF']?>" method="post">
<table frame="box">
<tr>
<td>Введите ФИО:</td> <td><input type="text" name="fio"></td>
</tr>
<tr>
<td>Введите Ваш город:</td> <td><input type="text" name="city"></td>
</tr>
<tr>
<td>Введите Ваш адрес:</td> <td><input type="text" name="address"></td>
</tr>
<tr>
<td>Введите Ваши контакты:</td> <td><input type="text" name="contact"></td>
</tr>
<tr>
<td>Выберите институт:</td> <td><select name="inst" size="1">
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
<td>Выберите факльтет:</td> <td><select name="fac">
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
<td>Выберите специальность:</td> <td><select name="spec">
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
<tr>
<td>Ведите дату заезда:</td>
<td>
<select name='checkInDay'>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
<select name="checkInMonth">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>

<select name="checkInYear">
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
<option>2021</option>
<option>2022</option>
</select>
</td>
</tr>
<tr>
<td>Ведите дату выезда:</td>
<td>
<select name='checkOutDay'>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>

<select name="checkOutMonth">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>

<select name="checkOutYear">
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
<option>2021</option>
<option>2022</option>
</select>
</td>
</tr>
</table>
<input type="submit" value="отправить"/>
</form>

</body>
</html>