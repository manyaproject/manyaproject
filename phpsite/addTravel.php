<?php
session_start();
require_once 'config.inc';
if($_SESSION['user'] !== "Administrator")
{
	echo "Вы не имеете доступа к этой странице";
	exit;
}
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$checkInDay = $_POST['checkInDay'];
		$checkInMonth = $_POST['checkInMonth'];
		$checkInYear = $_POST['checkInYear'];
		$checkOutDay = $_POST['checkOutDay'];
		$checkOutMonth = $_POST['checkOutMonth'];
		$checkOutYear = $_POST['checkOutYear'];
		$currentDate = mktime();
		$checkIn = mktime(0, 0, 0, $checkInMonth, $checkInDay, $checkInYear);
		$checkOut = mktime(0, 0, 0, $checkOutMonth, $checkOutDay, $checkOutYear);
		if(!checkdate($checkInMonth, $checkInDay, $checkInYear) or !checkdate($checkOutMonth, $checkOutDay, $checkOutYear) or $checkIn >= $checkOut or $checkIn <= $currentDate)
		{
			echo "Вы ввели не правильную дату";
			exit;
		}
		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES cp1251");
		$sql = "insert into travel(check_in, check_out) values('$checkIn', '$checkOut')";
		mysql_query($sql) or die(mysql_error());
		mysql_close();
		header("Location:". $_SERVER['SCRIPT_NAME']);
		exit;
	}
?>
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
<!--  <tr>
    <td width="938" height="348" border="0" cellpadding="0" cellspacing="0">
      <tr>-->
  <? include ("blocks/lefttd.php");  ?>     
  </tr> 
      <tr> 
        <td width="810" valign="top" class="style1"  background="img/kontext.jpg">

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<table>
<tr>
<td>Введіть дату заїзду:</td>
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
<td>Ведите дату виїзду:</td>
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
<input type="submit" value="додати"/>
</form>
<a href="logged_in.php">повернутся в аккаунт</a>
		</td>
         <td width="246" valign="top" bgcolor="#000066" background="img/right.jpg">
         <br><img  src="img/avtorizaciya.jpg"> 
          <? include ("login.php");  ?>  
         </td>
      </tr>
    </td>
  </tr>
  <tr>
    <td height="52" colspan=2 background= "img/footer.jpg" class="style2" align="center">“Санаторій-профілакторій "Супутник” © 2012&nbsp; | &nbsp;Федорова Марія</td>
  </tr>
</table>
</body>
</html>